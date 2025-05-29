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
        
        $gurus = Murid::when($search, function($query) use ($search) {
                return $query->where('nama', 'like', '%'.$search.'%')
                            ->orWhere('kelas', 'like', '%'.$search.'%')
                            ->orWhere('jenis_kelamin', 'like', '%'.$search.'%');;
            })
            ->orderBy('nama')  // Order before pagination
            ->paginate(10);    // Paginate comes last

            return view('admin.murid.index', compact('murids'));
    }

    public function store(MuridRequest $request)
    {
        $data = $request->validated();

        $result = cloudinary()->uploadApi()->upload($data['foto']->getRealPath(), [
            'folder' => 'pesertaDidik',
            'transformation' => [
                'quality' => 'auto',
                'fetch_format' => 'auto',
                'compression' => 'low',
            ]
        ]);
        if (!$result) {
            return redirect()->route('admin.murid.index')->with('error', 'Gagal mengunggah foto');
        }

        // Format nama dengan proper case
        $nama = preg_replace_callback(
            '/\b[a-z]+\b|\b[A-Z]+\b|^[a-z]/m',
            function ($matches) {
                return ucfirst(strtolower($matches[0]));
            },
            $data['nama']
        );

        $murid = Murid::create([
            'nama' => $nama,
            'kelas' => $data['kelas'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'public_id' => $result['public_id'],
            'url_file' => $result['secure_url']
        ]);

        if (!$murid) {
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

        if ($data['foto'] != null) {
            if ($murid->public_id) {
                cloudinary()->uploadApi()->destroy($murid->public_id);
            }

            $result = cloudinary()->uploadApi()->upload($data['foto']->getRealPath(), [
                'folder' => 'pesertaDidik',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto',
                    'compression' => 'low',
                ]
            ]);

            $data = [
                'nama' => strtolower($data['nama']),
                'kelas' => $data['kelas'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'public_id' => $result['public_id'],
                'url_file' => $result['secure_url']
            ];
        }

        $result = $murid->update($data);
        if (!$result) {
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
