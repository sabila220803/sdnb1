<?php

namespace App\Models;

class BeritaLengkap
{
    public function getAllNews()
    {
        return [
            [
                'id' => 0,
                'judul' => 'Tujuh Kunci Sukses Sekolah Berkemajuan',
                'tanggal' => '9 Mei 2025',
                'gambar' => 'images/berita/berita1.jpg',
                'link' => route('berita.detail', 0)
            ],
            [
                'id' => 1,
                'judul' => 'Prestasi Gemilang di Olimpiade Sains',
                'tanggal' => '8 Mei 2025',
                'gambar' => 'images/berita/berita1.jpg',
                'link' => route('berita.detail', 1)
            ],
            [
                'id' => 2,
                'judul' => 'Perayaan Hari Kartini yang Meriah',
                'tanggal' => '7 Mei 2025',
                'gambar' => 'images/berita/berita1.jpg',
                'link' => route('berita.detail', 2)
            ]
        ];
    }
}