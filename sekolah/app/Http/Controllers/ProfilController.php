<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('profil.guru-staff');
    }

    public function ekstrakurikuler()
    {
        return view('profil.ekstrakurikuler');
    }

    public function prestasi()
    {
        return view('profil.prestasi');
    }

    public function kelas()
    {
        return view('profil.kelas');
    }

    public function detailKelas($id)
    {
        if ($id == 1) {
            $dataSiswaLaki = [
                'ARYA KUSUMA WARDANA',
                'BUDI SANTOSO',
                'DIMAS PRATAMA',
                'FAJAR RAMADHAN',
                'HADI WIJAYA',
                'ILHAM PRATAMA',
                'KEVIN WIJAYA',
                'MUHAMMAD RIZKI',
                'NAUFAL HIDAYAT'
            ];

            $dataSiswaPerempuan = [
                'SABILA WAHYU PRATAMA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA',
                'AFIQAH NAGITA KHOIRUNNISA'
            ];

            return view('profil.kelas-detail', [
                'dataSiswaLaki' => $dataSiswaLaki,
                'dataSiswaPerempuan' => $dataSiswaPerempuan
            ]);
        } elseif ($id == 4) {
            $dataSiswaLaki = [
                'ADITYA PRATAMA',
                'BIMA SAKTI',
                'CAHYA NUGRAHA',
                'DIKA SAPUTRA',
                'ENDRA KUSUMA',
                'FARIZ RAHMAN',
                'GALIH PRATAMA',
                'HARIS SETIAWAN',
                'INDRA GUNAWAN',
                'JANUAR WIJAYA',
                'KOKO PRAYOGA',
                'LUTFI HAKIM',
                'MALIK IBRAHIM',
                'NANDA PRASETYA'
            ];

            $dataSiswaPerempuan = [
                'AMELIA PUTRI',
                'BUNGA CITRA',
                'CINTA LESTARI',
                'DINDA AURA',
                'ELSA SAFITRI',
                'FITRI HANDAYANI',
                'GITA NIRMALA',
                'HANA PERTIWI',
                'INDAH PERMATA',
                'JASMINE PUTRI',
                'KIARA SARI',
                'LUNA MAYA',
                'MILA KAMILA',
                'NADIA SAFIRA'
            ];

            return view('profil.kelas-detail-4', [
                'dataSiswaLaki' => $dataSiswaLaki,
                'dataSiswaPerempuan' => $dataSiswaPerempuan
            ]);
        } elseif ($id == 2) {
            $dataSiswaLaki = [
                'AHMAD RIZKI',
                'BAGAS PRASETYO',
                'DENI SAPUTRA',
                'ERICK KURNIAWAN',
                'FARHAN ABDULLAH',
                'GILANG RAMADHAN',
                'HENDRA WIJAYA',
                'IRFAN MAULANA',
                'JOKO SANTOSO',
                'KRISNA PUTRA',
                'LUTFI HAKIM',
                'MARIO TEGUH'
            ];

            $dataSiswaPerempuan = [
                'ANISA PUTRI',
                'BELLA SAFITRI',
                'CITRA DEWI',
                'DINA AULIA',
                'EVA ANGGRAINI',
                'FITRI HANDAYANI',
                'GITA LESTARI',
                'HANA PERMATA',
                'IRA MAHARANI',
                'JESSICA MILA',
                'KARTIKA SARI',
                'LISA PERMATA',
                'MAYA ANGELINA'
            ];

            return view('profil.kelas-detail-2', [
                'dataSiswaLaki' => $dataSiswaLaki,
                'dataSiswaPerempuan' => $dataSiswaPerempuan
            ]);
        } elseif ($id == 3) {
            $dataSiswaLaki = [
                'ADITYA PRATAMA',
                'BIMA SAKTI',
                'CAHYA KUMARA',
                'DIKA SAPUTRA',
                'ENDRA GUNAWAN',
                'FARIZ RAHMAN',
                'GALIH PRATAMA',
                'HARIS SETIAWAN',
                'INDRA LESMANA',
                'JANUAR WIJAYA',
                'KURNIA PUTRA',
                'LUKMAN HAKIM',
                'MALIK IBRAHIM',
                'NANDA PRASETYA',
                'OSCAR PRATAMA'
            ];

            $dataSiswaPerempuan = [
                'AMELIA PUTRI',
                'BUNGA CITRA',
                'CINTA LAURA',
                'DINDA KIRANA',
                'ELSA SAFITRI',
                'FANI AMANDA',
                'GISELLA ANASTASIA',
                'HANNI PUTRI',
                'INDAH PERMATA',
                'JASMINE AURA',
                'KEISHA ALVARO',
                'LUNA MAYA',
                'MAUDY AYUNDA',
                'NABILA PUTRI',
                'OLIVIA JENSEN'
            ];

            return view('profil.kelas-detail-3', [
                'dataSiswaLaki' => $dataSiswaLaki,
                'dataSiswaPerempuan' => $dataSiswaPerempuan
            ]);
        } elseif ($id == 5) {
            $dataSiswaLaki = [
                'AHMAD RIZKI',
                'BAGAS PRATAMA',
                'DENI SETIAWAN',
                'ERICK KURNIAWAN',
                'FARHAN ABDULLAH',
                'GILANG RAMADHAN',
                'HENDRA WIJAYA',
                'IRFAN MAULANA',
                'JOKO SANTOSO',
                'KRISNA PUTRA',
                'LUTFI HAKIM',
                'MARIO TEGUH',
                'NAUFAL PRATAMA'
            ];

            $dataSiswaPerempuan = [
                'ANISA PUTRI',
                'BELLA SAFITRI',
                'CITRA DEWI',
                'DINA AULIA',
                'EVA ANGGRAINI',
                'FITRI HANDAYANI',
                'GITA LESTARI',
                'HANA PERMATA',
                'IRA MAHARANI',
                'JESSICA MILA',
                'KARTIKA SARI',
                'LISA PERMATA',
                'MAYA ANGELINA',
                'NABILA PUTRI',
                'OLIVIA JENSEN'
            ];

            return view('profil.kelas-detail-5', [
                'dataSiswaLaki' => $dataSiswaLaki,
                'dataSiswaPerempuan' => $dataSiswaPerempuan
            ]);
        } elseif ($id == 6) {
            $dataSiswaLaki = [
                'ADITYA PRATAMA',
                'BIMA SAKTI',
                'CAHYA NUGRAHA',
                'DIKA SAPUTRA',
                'ENDRA KUSUMA',
                'FARIZ RAHMAN',
                'GALIH PRATAMA',
                'HARIS SETIAWAN',
                'INDRA GUNAWAN',
                'JANUAR WIJAYA',
                'KOKO PRAYOGA',
                'LUTFI HAKIM',
                'MALIK IBRAHIM',
                'NANDA PRASETYA'
            ];

            $dataSiswaPerempuan = [
                'AMELIA PUTRI',
                'BUNGA CITRA',
                'CINTA LESTARI',
                'DINDA AURA',
                'ELSA SAFITRI',
                'FITRI HANDAYANI',
                'GITA NIRMALA',
                'HANA PERTIWI',
                'INDAH PERMATA',
                'JASMINE PUTRI',
                'KIARA SARI',
                'LUNA MAYA',
                'MILA KAMILA',
                'NADIA SAFIRA'
            ];

            return view('profil.kelas-detail-6', [
                'dataSiswaLaki' => $dataSiswaLaki,
                'dataSiswaPerempuan' => $dataSiswaPerempuan
            ]);
        }

        return redirect()->route('profil.kelas');
    }
}