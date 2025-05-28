<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kurikulum;
use Cloudinary;

class KurikulumController extends Controller
{
    public function index()
    {
        $kurikulums = Kurikulum::orderBy('created_at', 'desc')->get();
        return view('admin.kurikulum.index', compact('kurikulums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|in:Kalender Akademik,Jadwal Pelajaran,Silabus,RPP,Materi Pembelajaran,Dokumen Lainnya',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
            'deskripsi' => 'nullable|string'
        ]);

        $uploadedFile = $request->file('file');
        $options = [];

        // Jika file adalah gambar, upload sebagai image
        if (in_array($uploadedFile->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {
            $options['resource_type'] = 'image';
        } else {
            $options['resource_type'] = 'raw';
        }

        $result = Cloudinary::upload($uploadedFile->getRealPath(), $options);

        Kurikulum::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'public_id' => $result->getPublicId(),
            'url_file' => $result->getSecurePath()
        ]);

        return redirect()->route('admin.kurikulum.index')->with('success', 'Dokumen kurikulum berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        return response()->json($kurikulum);
    }

    public function update(Request $request, $id)
    {
        $kurikulum = Kurikulum::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|in:Kalender Akademik,Jadwal Pelajaran,Silabus,RPP,Materi Pembelajaran,Dokumen Lainnya',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
            'deskripsi' => 'nullable|string'
        ]);

        $data = [
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi
        ];

        if ($request->hasFile('file')) {
            if ($kurikulum->public_id) {
                // Tentukan resource_type berdasarkan ekstensi file yang ada
                $resourceType = in_array(pathinfo($kurikulum->url_file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png'])
                    ? 'image'
                    : 'raw';

                Cloudinary::destroy($kurikulum->public_id, ['resource_type' => $resourceType]);
            }

            $uploadedFile = $request->file('file');
            $options = [];

            // Tentukan resource_type berdasarkan ekstensi file baru
            if (in_array($uploadedFile->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {
                $options['resource_type'] = 'image';
            } else {
                $options['resource_type'] = 'raw';
            }

            $result = Cloudinary::upload($uploadedFile->getRealPath(), $options);

            $data['public_id'] = $result->getPublicId();
            $data['url_file'] = $result->getSecurePath();
        }

        $kurikulum->update($data);

        return redirect()->route('admin.kurikulum.index')->with('success', 'Dokumen kurikulum berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);

        if ($kurikulum->public_id) {
            // Tentukan resource_type berdasarkan ekstensi file
            $resourceType = in_array(pathinfo($kurikulum->url_file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png'])
                ? 'image'
                : 'raw';

            Cloudinary::destroy($kurikulum->public_id, ['resource_type' => $resourceType]);
        }

        $kurikulum->delete();

        return redirect()->route('admin.kurikulum.index')->with('success', 'Dokumen kurikulum berhasil dihapus');
    }
}
