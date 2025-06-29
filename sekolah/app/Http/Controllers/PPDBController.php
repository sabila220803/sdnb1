<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PPDBController extends Controller
{
    public function index()
    {
        return view('ppdb.index');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'nama_ortu' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
        ]);

        // TODO: Implement pendaftaran logic
        // Untuk saat ini, kita akan redirect kembali dengan pesan sukses
        return redirect()->route('ppdb.index')
            ->with('success', 'Pendaftaran berhasil dikirim! Kami akan menghubungi Anda untuk proses selanjutnya.');
    }
}