<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guru\StoreGuruRequest;
use App\Http\Requests\Guru\UpdateGuruRequest;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $gurus = Guru::when($search, function($query) use ($search) {
                return $query->where('nama', 'like', '%'.$search.'%')
                            ->orWhere('jabatan', 'like', '%'.$search.'%');
            })
            ->orderBy('nama')  // Order before pagination
            ->paginate(10);    // Paginate comes last

        return view('admin.guru.index', compact('gurus'));
    }

    public function store(StoreGuruRequest $request)
    {
        $data = $request->validated();

        $image = cloudinary()->uploadApi()->upload($data['foto']->getRealPath(), [
            'folder' => 'guru',
            'transformation' => [
                'quality' => 'auto',
                'fetch_format' => 'auto',
                'compression' => 'low',
            ]
        ]);

        // Format nama dengan proper case dan penanganan gelar
        $nama = preg_replace_callback(
            '/\b[a-z]+\b|\b[A-Z]+\b|(?<=\.)\s*[a-z]|^[a-z]/m',
            function ($matches) {
                return ucfirst(strtolower($matches[0]));
            },
            $data['nama']
        );

        $result = Guru::create([
            'nama' => $nama,
            'jabatan' => strtolower($data['jabatan']),
            'public_id' => $image['public_id'],
            'url_file' => $image['secure_url']
        ]);
        if (!$result) {
            return redirect()->route('admin.guru.index')->with('error', 'Gagal menambahkan data guru/staff');
        }

        return redirect()->route('admin.guru.index')->with('success', 'Data guru/staff berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return response()->json($guru);
    }

    public function update(UpdateGuruRequest $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $data = $request->validated();

        $data = [
            'nama' => strtolower($data['nama']),
            'jabatan' => strtolower($data['jabatan']),
            'foto' => $data['foto'] ?? '',
        ];

        if ($data['foto'] != null) {
            if ($guru->public_id) {
               $result = cloudinary()->uploadApi()->destroy($guru->public_id);
               if (!$result) {
                   return redirect()->route('admin.guru.index')->with('error', 'Gagal menghapus foto dari Cloudinary');
               }
            }

            $uploadedFile = $data['foto'];
            $result = cloudinary()->uploadApi()->upload($uploadedFile->getRealPath(), [
                'folder' => 'guru',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto',
                    'compression' => 'low',
                ]
            ]);
            if (!$result) {
                return redirect()->route('admin.guru.index')->with('error', 'Gagal mengunggah foto ke Cloudinary');
            }

            $data['public_id'] = $result['public_id'];
            $data['url_file'] = $result['secure_url'];
        }

        $result = $guru->update($data);
        if (!$result) {
            return redirect()->route('admin.guru.index')->with('error', 'Gagal memperbarui data guru/staff');
        }

        return redirect()->route('admin.guru.index')->with('success', 'Data guru/staff berhasil diperbarui');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->public_id) {
            $result = cloudinary()->uploadApi()->destroy($guru->public_id);
            if (!$result) {
                return redirect()->route('admin.guru.index')->with('error', 'Gagal menghapus foto dari Cloudinary');
            }
        }

        $result = $guru->delete();
        if (!$result) {
            return redirect()->route('admin.guru.index')->with('error', 'Gagal menghapus data guru/staff');
        }

        return redirect()->route('admin.guru.index')->with('success', 'Data guru/staff berhasil dihapus');
    }
}
