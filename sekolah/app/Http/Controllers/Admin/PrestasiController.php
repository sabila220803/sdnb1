<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use Cloudinary;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::orderBy('created_at', 'desc')->get();
        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'nama_kompetisi' => 'required|string|max:255',
            'tingkat' => 'required|string|in:Kota/Kabupaten,Provinsi,Nasional,Internasional',
            'peringkat' => 'required|integer|min:1',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $uploadedFile = $request->file('foto');
        $result = Cloudinary::upload($uploadedFile->getRealPath());

        Prestasi::create([
            'nama_peserta' => $request->nama_peserta,
            'nama_kompetisi' => $request->nama_kompetisi,
            'tingkat' => $request->tingkat,
            'peringkat' => $request->peringkat,
            'tahun' => $request->tahun,
            'public_id' => $result->getPublicId(),
            'url_file' => $result->getSecurePath()
        ]);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return response()->json($prestasi);
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'nama_kompetisi' => 'required|string|max:255',
            'tingkat' => 'required|string|in:Kota/Kabupaten,Provinsi,Nasional,Internasional',
            'peringkat' => 'required|integer|min:1',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'nama_peserta' => $request->nama_peserta,
            'nama_kompetisi' => $request->nama_kompetisi,
            'tingkat' => $request->tingkat,
            'peringkat' => $request->peringkat,
            'tahun' => $request->tahun
        ];

        if ($request->hasFile('foto')) {
            if ($prestasi->public_id) {
                Cloudinary::destroy($prestasi->public_id);
            }

            $uploadedFile = $request->file('foto');
            $result = Cloudinary::upload($uploadedFile->getRealPath());

            $data['public_id'] = $result->getPublicId();
            $data['url_file'] = $result->getSecurePath();
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        if ($prestasi->public_id) {
            Cloudinary::destroy($prestasi->public_id);
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus');
    }
}
