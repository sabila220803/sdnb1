<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestasiSeeder extends Seeder
{
    public function run()
    {
        $prestasis = [
            [
                'nama_peserta' => 'Nadira Nova Okananta',
                'nama_lomba' => 'KSN IPA putri',
                'tingkat' => 'Kecamatan',
                'juara' => 3,
                'tahun' => 2021,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peserta' => 'Alam Nia Kristina',
                'nama_lomba' => 'Cerita Islami Putri',
                'tingkat' => 'Kecamatan',
                'juara' => 1,
                'tahun' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peserta' => 'Ega Putra Prasetyo',
                'nama_lomba' => 'Teknologi Informasi dan Komunikasi Islami',
                'tingkat' => 'Kecamatan',
                'juara' => 3,
                'tahun' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peserta' => 'Justin Jakiadi',
                'nama_lomba' => 'Cerdas Cermat Terpadu',
                'tingkat' => 'Kecamatan',
                'juara' => 3,
                'tahun' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peserta' => 'Muhammad Nadhif Akhsan',
                'nama_lomba' => 'Seni Cerita Islami Putra',
                'tingkat' => 'Kecamatan',
                'juara' => 1,
                'tahun' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peserta' => 'Zahra Octaviana',
                'nama_lomba' => 'Cerdas Cermat Terpadu Putri',
                'tingkat' => 'Kecamatan',
                'juara' => 3,
                'tahun' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peserta' => 'Solekan Maulana Ibrahim',
                'nama_lomba' => 'Praktik Ibadah Salat Fardu',
                'tingkat' => 'Kecamatan',
                'juara' => 1,
                'tahun' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peserta' => 'Alam Nia Kristina',
                'nama_lomba' => 'Cerita Islami Putri',
                'tingkat' => 'Kota',
                'juara' => 1,
                'tahun' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peserta' => 'Alam Nia Kristina',
                'nama_lomba' => 'Cerita Islami Putri',
                'tingkat' => 'Provinsi',
                'juara' => 1,
                'tahun' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('prestasi')->insert($prestasis);
    }
}
