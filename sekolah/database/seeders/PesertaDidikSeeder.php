<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesertaDidikSeeder extends Seeder
{
    public function run(): void
    {
        $siswa = [
            // Kelas 1
            ['nama' => 'Ahmad Rizki', 'jenis_kelamin' => 'L', 'kelas' => 1],
            ['nama' => 'Budi Santoso', 'jenis_kelamin' => 'L', 'kelas' => 1],
            ['nama' => 'Citra Dewi', 'jenis_kelamin' => 'P', 'kelas' => 1],
            ['nama' => 'Dian Puspita', 'jenis_kelamin' => 'P', 'kelas' => 1],
            ['nama' => 'Eko Prasetyo', 'jenis_kelamin' => 'L', 'kelas' => 1],
            ['nama' => 'Farah Nabila', 'jenis_kelamin' => 'P', 'kelas' => 1],
            ['nama' => 'Galih Pratama', 'jenis_kelamin' => 'L', 'kelas' => 1],
            ['nama' => 'Hana Pertiwi', 'jenis_kelamin' => 'P', 'kelas' => 1],

            // Kelas 2
            ['nama' => 'Indra Kusuma', 'jenis_kelamin' => 'L', 'kelas' => 2],
            ['nama' => 'Joko Widodo', 'jenis_kelamin' => 'L', 'kelas' => 2],
            ['nama' => 'Kartika Sari', 'jenis_kelamin' => 'P', 'kelas' => 2],
            ['nama' => 'Lina Marlina', 'jenis_kelamin' => 'P', 'kelas' => 2],
            ['nama' => 'Muhammad Rizki', 'jenis_kelamin' => 'L', 'kelas' => 2],
            ['nama' => 'Nina Septiani', 'jenis_kelamin' => 'P', 'kelas' => 2],
            ['nama' => 'Oscar Pratama', 'jenis_kelamin' => 'L', 'kelas' => 2],
            ['nama' => 'Putri Aulia', 'jenis_kelamin' => 'P', 'kelas' => 2],

            // Kelas 3
            ['nama' => 'Qori Handayani', 'jenis_kelamin' => 'P', 'kelas' => 3],
            ['nama' => 'Rudi Hermawan', 'jenis_kelamin' => 'L', 'kelas' => 3],
            ['nama' => 'Siti Nurhaliza', 'jenis_kelamin' => 'P', 'kelas' => 3],
            ['nama' => 'Tono Sucipto', 'jenis_kelamin' => 'L', 'kelas' => 3],
            ['nama' => 'Udin Sedunia', 'jenis_kelamin' => 'L', 'kelas' => 3],
            ['nama' => 'Vina Panduwinata', 'jenis_kelamin' => 'P', 'kelas' => 3],
            ['nama' => 'Wati Sulistyowati', 'jenis_kelamin' => 'P', 'kelas' => 3],
            ['nama' => 'Xaverius Rajasa', 'jenis_kelamin' => 'L', 'kelas' => 3],

            // Kelas 4
            ['nama' => 'Yuda Pratama', 'jenis_kelamin' => 'L', 'kelas' => 4],
            ['nama' => 'Zahra Putri', 'jenis_kelamin' => 'P', 'kelas' => 4],
            ['nama' => 'Adi Nugroho', 'jenis_kelamin' => 'L', 'kelas' => 4],
            ['nama' => 'Bella Safitri', 'jenis_kelamin' => 'P', 'kelas' => 4],
            ['nama' => 'Candra Wijaya', 'jenis_kelamin' => 'L', 'kelas' => 4],
            ['nama' => 'Dinda Ayu', 'jenis_kelamin' => 'P', 'kelas' => 4],
            ['nama' => 'Edi Sulistyo', 'jenis_kelamin' => 'L', 'kelas' => 4],
            ['nama' => 'Fani Oktavia', 'jenis_kelamin' => 'P', 'kelas' => 4],

            // Kelas 5
            ['nama' => 'Gunawan Wibisono', 'jenis_kelamin' => 'L', 'kelas' => 5],
            ['nama' => 'Hesti Yulianti', 'jenis_kelamin' => 'P', 'kelas' => 5],
            ['nama' => 'Irfan Bachdim', 'jenis_kelamin' => 'L', 'kelas' => 5],
            ['nama' => 'Julia Perez', 'jenis_kelamin' => 'P', 'kelas' => 5],
            ['nama' => 'Koko Pribadi', 'jenis_kelamin' => 'L', 'kelas' => 5],
            ['nama' => 'Lisa Angela', 'jenis_kelamin' => 'P', 'kelas' => 5],
            ['nama' => 'Mario Teguh', 'jenis_kelamin' => 'L', 'kelas' => 5],
            ['nama' => 'Nadia Safira', 'jenis_kelamin' => 'P', 'kelas' => 5],

            // Kelas 6
            ['nama' => 'Opick Tombo', 'jenis_kelamin' => 'L', 'kelas' => 6],
            ['nama' => 'Putri Titian', 'jenis_kelamin' => 'P', 'kelas' => 6],
            ['nama' => 'Qinan Ahmad', 'jenis_kelamin' => 'L', 'kelas' => 6],
            ['nama' => 'Ratna Galih', 'jenis_kelamin' => 'P', 'kelas' => 6],
            ['nama' => 'Surya Saputra', 'jenis_kelamin' => 'L', 'kelas' => 6],
            ['nama' => 'Tika Ramlan', 'jenis_kelamin' => 'P', 'kelas' => 6],
            ['nama' => 'Umar Zain', 'jenis_kelamin' => 'L', 'kelas' => 6],
            ['nama' => 'Vanessa Angel', 'jenis_kelamin' => 'P', 'kelas' => 6],
        ];

        foreach ($siswa as $data) {
            DB::table('peserta_didik')->insert($data);
        }
    }
}
