<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;
use Cloudinary;

class MuridController extends Controller
{
    public function index()
    {
        $murids = Murid::orderBy('kelas')->orderBy('nama')->get();
        return view('admin.murid.index', compact('murids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|integer|between:1,6',
            'jenis_kelamin' => 'required|in:L,P',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $uploadedFile = $request->file('foto');
        $result = Cloudinary::upload($uploadedFile->getRealPath());

        // Format nama dengan proper case
        $nama = preg_replace_callback(
            '/\b[a-z]+\b|\b[A-Z]+\b|^[a-z]/m',
            function ($matches) {
                return ucfirst(strtolower($matches[0]));
            },
            $request->nama
        );

        Murid::create([
            'nama' => $nama,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'public_id' => $result->getPublicId(),
            'url_file' => $result->getSecurePath()
        ]);

        return redirect()->route('admin.murid.index')->with('success', 'Data murid berhasil ditambahkan');
    }

    public function edit($id)
    {
        $murid = Murid::findOrFail($id);
        return response()->json($murid);
    }

    public function update(Request $request, $id)
    {
        $murid = Murid::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|integer|between:1,6',
            'jenis_kelamin' => 'required|in:L,P',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Format nama dengan proper case
        $nama = preg_replace_callback(
            '/\b[a-z]+\b|\b[A-Z]+\b|^[a-z]/m',
            function ($matches) {
                return ucfirst(strtolower($matches[0]));
            },
            $request->nama
        );

        $data = [
            'nama' => $nama,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin
        ];

        if ($request->hasFile('foto')) {
            if ($murid->public_id) {
                Cloudinary::destroy($murid->public_id);
            }

            $uploadedFile = $request->file('foto');
            $result = Cloudinary::upload($uploadedFile->getRealPath());

            $data['public_id'] = $result->getPublicId();
            $data['url_file'] = $result->getSecurePath();
        }

        $murid->update($data);

        return redirect()->route('admin.murid.index')->with('success', 'Data murid berhasil diperbarui');
    }

    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);

        if ($murid->public_id) {
            Cloudinary::destroy($murid->public_id);
        }

        $murid->delete();

        return redirect()->route('admin.murid.index')->with('success', 'Data murid berhasil dihapus');
    }
}
