<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderBy('nama')->get();
        return view('admin.guru.index', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $uploadedFile = $request->file('foto');
        $image = Cloudinary::upload($uploadedFile->getRealPath(), [
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
            $request->nama
        );

        $result = Guru::create([
            'nama' => $nama,
            'jabatan' => strtolower($request->jabatan),
            'public_id' => $image->getPublicId(),
            'url_file' => $image->getSecurePath()
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

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Format nama dengan proper case
        $nama = strtolower($request->nama);

        $data = [
            'nama' => $nama,
            'jabatan' => strtolower($request->jabatan)
        ];

        if ($request->hasFile('foto')) {
            if ($guru->public_id) {
               $result = Cloudinary::destroy($guru->public_id);
               if (!$result) {
                   return redirect()->route('admin.guru.index')->with('error', 'Gagal menghapus foto dari Cloudinary');
               }
            }

            $uploadedFile = $request->file('foto');
            $result = Cloudinary::upload($uploadedFile->getRealPath(), [
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

            $data['public_id'] = $result->getPublicId();
            $data['url_file'] = $result->getSecurePath();
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
            $result = Cloudinary::destroy($guru->public_id);
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
