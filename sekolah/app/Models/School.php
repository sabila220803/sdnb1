<?php

namespace App\Models;

use App\Models\BeritaUtama;

class School
{
    public function getPrograms()
    {
        return [['nama' => 'Program Tahfidz Al-Qur\'an'], ['nama' => 'Sarana & Prasarana Memadai'], ['nama' => 'Pendidik Profesional'], ['nama' => 'Bilingual (English & Arabic)'], ['nama' => 'Life Skill & Outdoor Activities'], ['nama' => 'Digital School'], ['nama' => 'Multiple Intelegence']];
    }

    public function getNews()
    {
        $berita = new BeritaUtama();
        return $berita->getLatestNews();
    }
}
