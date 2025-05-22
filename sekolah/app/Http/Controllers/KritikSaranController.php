<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    public function index()
    {
        return view('hubungi-kami.kritik-saran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'surel' => 'required|email|max:255',
            'nomor_kontak' => 'required|string|max:20',
            'deskripsi' => 'required|string'
        ]);

        // TODO: Implementasi penyimpanan data ke database
        // Untuk saat ini kita akan redirect kembali dengan pesan sukses
        
        return redirect()->back()->with('success', 'Terima kasih atas kritik dan saran Anda. Kami akan meninjau dan menindaklanjuti masukan Anda.');
    }
}