<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Models\PesertaDidik as Siswa;

class ProfilController extends Controller
{
    public function sejarah()
    {
        return view('profil.sejarah');
    }

    public function visiMisi()
    {
        return view('profil.visi-misi');
    }

    public function guruStaff()
    {
        $gurus = Guru::all();
        return view('profil.guru-staff', compact('gurus'));
    }

    public function ekstrakurikuler()
    {
        return view('profil.ekstrakurikuler');
    }

    public function prestasi()
    {
        $prestasis = Prestasi::all();
        return view('profil.prestasi', compact('prestasis'));
    }

    public function kelas()
    {
        return view('profil.kelas');
    }

    public function detailKelas(int $kelas)
    {
        $siswas = Siswa::where('kelas', $kelas)->get();
        return view('profil.kelas-detail', compact('siswas', 'kelas'));
    }
}