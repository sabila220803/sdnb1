<?php

namespace App\Http\Controllers;
use App\Models\KalenderPendidikan as Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function sekolah()
    {
        return view('kurikulum.sekolah');
    }

    public function kalender()
    {
        $kalenders = Kurikulum::all();
        return view('kurikulum.kalender', compact('kalenders'));
    }

    public function video()
    {
        return view('kurikulum.video');
    }

    public function download($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        $url = $kurikulum->url_file;

        // Ambil isi file dari Cloudinary
        $fileContents = file_get_contents($url);

        // Simpan nama file dengan ekstensi .pdf
        $fileName = strtolower($kurikulum->nama) . '.pdf';

        return response()->streamDownload(function () use ($fileContents) {
            echo $fileContents;
        }, $fileName, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}