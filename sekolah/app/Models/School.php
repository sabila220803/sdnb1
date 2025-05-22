<?php

namespace App\Models;

use App\Models\BeritaUtama;

class School
{
    public function getSchoolInfo()
    {
        return [
            'nama_sekolah' => 'SD Negeri Bandarharjo 1',
            'kota' => 'Kota Semarang',
            'motto' => 'Unggul dalam prestasi dilandasi akhlaqul karimah, sehat, bersih, hijau dan lestari',
            'kepala_sekolah' => [
                'nama' => 'Christina Ardiyanti, S.Pd',
                'jabatan' => 'Kepala Sekolah',
                'foto' => 'images/kepsek.png',
                'sambutan' => [
                    'Assalamualaikum wr. wb.',
                    'Selamat datang di website resmi SDN Bandarharjo 01',
                    'Dengan penuh rasa syukur dan bangga, kami mempersembahkan website ini sebagai salah satu wadah untuk memperkenalkan dan berbagi informasi mengenai sekolah kita tercinta. Melalui media digital ini, kami berharap dapat menjangkau seluruh keluarga besar SDN Bandarharjo 01, mulai dari siswa, orang tua, hingga alumni, serta masyarakat luas.',
                    'Website ini dirancang dengan tujuan untuk memberikan kemudahan akses informasi mengenai kegiatan akademik, jadwal sekolah, berita terbaru, dan berbagai aktivitas lainnya yang berlangsung di sekolah ini. Selain itu, kami juga menyediakan berbagai sumber daya yang bermanfaat bagi siswa, orang tua, dan tenaga pendidik dalam mendukung proses belajar mengajar.',
                    'Kami percaya bahwa komunikasi yang baik antara sekolah, siswa, dan orang tua merupakan kunci kesuksesan pendidikan. Oleh karena itu, kami berharap website ini dapat menjadi sarana yang efektif untuk memperkuat hubungan tersebut, serta mempermudah dalam menyampaikan berbagai informasi penting.',
                    'Wassalamualaikum wr. wb.'
                ]
            ]
        ];
    }

    public function getAchievements()
    {
        return [
            [
                'nama' => 'Naura Maritza',
                'prestasi' => 'Juara 1 O2SN Tungkat Kota',
                'foto' => 'images/prestasi/Fayeza.jpg'
            ],
            [
                'nama' => 'Naura Maritza',
                'prestasi' => 'Juara 1 O2SN Tungkat Kota',
                'foto' => 'images/prestasi/naura-maritza.jpg'
            ],
            [
                'nama' => 'Naura Maritza',
                'prestasi' => 'Juara 1 O2SN Tungkat Kota',
                'foto' => 'images/prestasi/Fayeza.jpg'
            ],
            [
                'nama' => 'Naura Maritza',
                'prestasi' => 'Juara 1 O2SN Tungkat Kota',
                'foto' => 'images/prestasi/naura-maritza.jpg'
            ],
            [
                'nama' => 'Naura Maritza',
                'prestasi' => 'Juara 1 O2SN Tungkat Kota',
                'foto' => 'images/prestasi/Fayeza.jpg'
            ]
        ];
    }

    public function getPrograms()
    {
        return [
            ['nama' => 'Program Tahfidz Al-Qur\'an'],
            ['nama' => 'Sarana & Prasarana Memadai'],
            ['nama' => 'Pendidik Profesional'],
            ['nama' => 'Bilingual (English & Arabic)'],
            ['nama' => 'Life Skill & Outdoor Activities'],
            ['nama' => 'Digital School'],
            ['nama' => 'Multiple Intelegence']
        ];
    }

    public function getNews()
    {
        $berita = new BeritaUtama();
        return $berita->getLatestNews();
    }
}