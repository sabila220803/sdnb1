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
        
        $data = [
            'nama' => strtolower($data['nama']),
            'kelas' => $data['kelas'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'foto' => $data['foto'] ?? '',
        ];

        if($data !=null){
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
            $data['public_id'] = $result['public_id'];
            $data['url_file'] = $result['secure_url'];
        }

        $murid = Murid::create($data);

        if (!$murid) {
            if (isset($result['public_id'])) {
                // Hapus foto dari Cloudinary jika murid gagal disimpan
                cloudinary()->uploadApi()->destroy($result['public_id']);
            }
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
        $data = $request->validated();

        $murid = Murid::findOrFail($id);
        if(!$murid) {
            return redirect()->route('admin.murid.index')->with('error', 'Murid tidak ditemukan');
        }

        $data = [
            'nama' => strtolower($data['nama']),
            'kelas' => $data['kelas'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'foto' => $data['foto'] ?? '',
        ];

        if ($data['foto'] != null) {
            if ($murid->public_id) {
                $result = cloudinary()->uploadApi()->destroy($murid->public_id);
                if (!$result) {
                    return redirect()->route('admin.murid.index')->with('error', 'Gagal menghapus foto dari Cloudinary');
                }
            }

            $image = cloudinary()
                ->uploadApi()
                ->upload($data['foto']->getRealPath(), [
                    'folder' => 'pesertaDidik',
                    'transformation' => [
                        'quality' => 'auto',
                        'fetch_format' => 'auto',
                        'compression' => 'low',
                    ],
                ]);

            $data['public_id'] = $image['public_id'];
            $data['url_file'] = $image['secure_url'];
        }

        $result = $murid->update($data);
        if (!$result) {
            cloudinary()->uploadApi()->destroy($image['public_id']);
            return redirect()->route('admin.murid.index')->with('error', 'Gagal memperbarui data murid');
        }

        return redirect()->route('admin.murid.index')->with('success', 'Data murid berhasil diperbarui');
    }

    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);
        if (!$murid) {
            return redirect()->route('admin.murid.index')->with('error', 'Murid tidak ditemukan');
        }

        if ($murid->public_id) {
            $result = cloudinary()->uploadApi()->destroy($murid->public_id);
            if (!$result) {
                return redirect()->route('admin.murid.index')->with('error', 'Gagal menghapus foto dari Cloudinary');
            }
        }

        $result = $murid->delete();
        if (!$result) {
            return redirect()->route('admin.murid.index')->with('error', 'Gagal menghapus data murid');
        }

        return redirect()->route('admin.murid.index')->with('success', 'Data murid berhasil dihapus');
    }
}
