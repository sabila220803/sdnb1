<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run()
    {
        $gurus = [
            [
                'nama' => 'Christina Ardiyanti, S.Pd',
                'jabatan' => 'Kepala Sekolah',
            ],
            [
                'nama' => 'Bambang Sutejo, S.Pd',
                'jabatan' => 'Guru Kelas 6',
            ],
            [
                'nama' => 'Siti Aminah, S.Pd',
                'jabatan' => 'Guru Kelas 5',
            ],
            [
                'nama' => 'Ahmad Fauzi, S.Pd',
                'jabatan' => 'Guru Agama',
            ],
            [
                'nama' => 'Dewi Lestari, S.Pd',
                'jabatan' => 'Guru Kelas 4',
            ],
            [
                'nama' => 'Rudi Hartono, S.Pd',
                'jabatan' => 'Guru Kelas 3',
            ],
            [
                'nama' => 'Sri Wahyuni, S.Pd',
                'jabatan' => 'Guru Kelas 2',
            ],
            [
                'nama' => 'Budi Santoso, S.Pd',
                'jabatan' => 'Guru Kelas 1',
            ],
            [
                'nama' => 'Rina Wati, S.Pd',
                'jabatan' => 'Guru Bahasa Inggris',
            ],
            [
                'nama' => 'Agus Setiawan',
                'jabatan' => 'Staff Tata Usaha',
            ],
        ];

        foreach ($gurus as $guru) {
            Guru::create($guru);
        }
    }
}
