# SDN Bandarharjo 1 Website

Website resmi SDN Bandarharjo 1 Kota Semarang yang dibangun menggunakan Laravel dan Tailwind CSS.

## Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL
- XAMPP/Laragon (opsional)

## Langkah Instalasi

1. Clone repositori ini
```bash
git clone https://github.com/username/sdnb1.git
cd sdnb1/sekolah
```

2. Install dependensi PHP menggunakan Composer
```bash
composer install
```

3. Salin file .env.example menjadi .env dan sesuaikan konfigurasi
```bash
cp .env.example .env
```

Buka file .env dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sdnb1
DB_USERNAME=root
DB_PASSWORD=
```

4. Generate key aplikasi
```bash
php artisan key:generate
```

5. Jalankan migrasi database
```bash
php artisan migrate
```

6. Jalankan development server
```bash
php artisan serve
```

Buka browser dan akses `http://localhost:8000`

## Fitur

- Halaman Beranda dengan informasi sekolah
- Profil Sekolah (Sejarah, Visi & Misi)
- Informasi Guru dan Staff
- Galeri Kegiatan
- Berita dan Pengumuman
- Prestasi Siswa
- Program Unggulan
- Ekstrakurikuler
- Informasi Kelas
- Lomba dan Kompetisi
- Halaman Kontak

## Kontribusi

Jika Anda ingin berkontribusi pada pengembangan website ini, silakan buat pull request atau laporkan issue yang Anda temukan.

## Lisensi

Hak Cipta © 2024 SDN Bandarharjo 1 Kota Semarang. Seluruh hak dilindungi.
