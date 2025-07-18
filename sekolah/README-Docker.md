# Sekolah SDN B1 - Docker Setup

Panduan untuk menjalankan aplikasi Laravel Sekolah SDN B1 menggunakan Docker.

## Prasyarat

- Docker Desktop terinstall
- Docker Compose terinstall

## Cara Menjalankan

### 1. Clone Repository
```bash
git clone <repository-url>
cd sekolah
```

### 2. Setup Environment
Pastikan file `.env` sudah ada. Jika belum, copy dari `.env.example`:
```bash
cp .env.example .env
```

### 3. Build dan Jalankan Container
```bash
docker-compose up --build
```

Atau untuk menjalankan di background:
```bash
docker-compose up -d --build
```

### 4. Generate Application Key (jika diperlukan)
```bash
docker-compose exec app php artisan key:generate
```

### 5. Jalankan Migration
```bash
docker-compose exec app php artisan migrate
```

### 6. Jalankan Seeder (opsional)
```bash
docker-compose exec app php artisan db:seed
```

## Akses Aplikasi

Setelah container berjalan, aplikasi dapat diakses di:
- **URL**: http://localhost:8000

## Perintah Berguna

### Melihat Log Container
```bash
docker-compose logs -f app
```

### Masuk ke Container
```bash
docker-compose exec app bash
```

### Menghentikan Container
```bash
docker-compose down
```

### Menghentikan dan Menghapus Volume
```bash
docker-compose down -v
```

### Rebuild Container
```bash
docker-compose up --build --force-recreate
```

## Struktur File Docker

- `Dockerfile` - Konfigurasi image Docker
- `docker-compose.yml` - Konfigurasi service Docker Compose
- `docker/nginx.conf` - Konfigurasi Nginx
- `docker/supervisord.conf` - Konfigurasi Supervisor

## Database

Proyek ini menggunakan SQLite sebagai database default. File database akan dibuat otomatis di `database/database.sqlite`.

## Troubleshooting

### Permission Issues
Jika mengalami masalah permission:
```bash
docker-compose exec app chown -R www-data:www-data /var/www/html/storage
docker-compose exec app chown -R www-data:www-data /var/www/html/bootstrap/cache
```

### Clear Cache
```bash
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear
```

### Composer Install
Jika perlu install ulang dependencies:
```bash
docker-compose exec app composer install
```