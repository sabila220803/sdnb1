<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PesertaDidik as Murid;
use App\Http\Requests\Murid\MuridRequest;

class MuridController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $murids = Murid::when($search, function ($query) use ($search) {
            return $query
                ->where('nama', 'like', '%' . $search . '%')
                ->orWhere('kelas', 'like', '%' . $search . '%')
                ->orWhere('jenis_kelamin', 'like', '%' . $search . '%');
        })
            ->orderBy('created_at', 'DESC') // Order before pagination
            ->paginate(10); // Paginate comes last

        return view('admin.murid.index', compact('murids'));
    }

    public function store(MuridRequest $request)
    {
        $data = $request->validated();

        $result = cloudinary()
            ->uploadApi()
            ->upload($data['foto']->getRealPath(), [
                'folder' => 'pesertaDidik',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto',
                    'compression' => 'low',
                ],
            ]);
        if (!$result) {
            return redirect()->route('admin.murid.index')->with('error', 'Gagal mengunggah foto');
        }

        $murid = Murid::create([
            'nama' => strtolower($data['nama']),
            'kelas' => $data['kelas'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'public_id' => $result['public_id'],
            'url_file' => $result['secure_url'],
        ]);

        if (!$murid) {
            cloudinary()->uploadApi()->destroy($result['public_id']);
            return redirect()->route('admin.murid.index')->with('error', 'Gagal menambahkan data murid');
        }

        return redirect()->route('admin.murid.index')->with('success', 'Data murid berhasil ditambahkan');
    }

    public function edit($id)
    {
        $murid = Murid::findOrFail($id);
        return response()->json($murid);
    }

    public function update(MuridRequest $request, $id)
    {
        $murid = Murid::findOrFail($id);

        $data = $request->validated();

        $data = [
            'nama' => strtolower($data['nama']),
            'kelas' => $data['kelas'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'foto' => $data['foto'] ?? '',
        ];

        if ($data['foto'] != null) {
            if ($murid->public_id) {
                cloudinary()->uploadApi()->destroy($murid->public_id);
            }

            $result = cloudinary()
                ->uploadApi()
                ->upload($data['foto']->getRealPath(), [
                    'folder' => 'pesertaDidik',
                    'transformation' => [
                        'quality' => 'auto',
                        'fetch_format' => 'auto',
                        'compression' => 'low',
                    ],
                ]);

            $data['public_id'] = $result['public_id'];
            $data['url_file'] = $result['secure_url'];
        }

        $result = $murid->update($data);
        if (!$result) {
            cloudinary()->uploadApi()->destroy($data['public_id']);
            return redirect()->route('admin.murid.index')->with('error', 'Gagal memperbarui data murid');
        }

        return redirect()->route('admin.murid.index')->with('success', 'Data murid berhasil diperbarui');
    }

    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);

        if ($murid->public_id) {
            cloudinary()->uploadApi()->destroy($murid->public_id);
        }

        $murid->delete();

        return redirect()->route('admin.murid.index')->with('success', 'Data murid berhasil dihapus');
    }
}
