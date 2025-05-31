
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\MuridController;
use App\Http\Controllers\Admin\KurikulumController as AdminKurikulumController;

// Route untuk halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk halaman berita
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/{id}', [NewsController::class, 'show'])->name('berita.show');

// Route untuk halaman profil
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/visi-misi', [ProfilController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/guru-staff', [ProfilController::class, 'guruStaff'])->name('profil.guru-staff');
Route::get('/profil/ekstrakurikuler', [ProfilController::class, 'ekstrakurikuler'])->name('profil.ekstrakurikuler');
Route::get('/profil/prestasi', [ProfilController::class, 'prestasi'])->name('profil.prestasi');
Route::get('/profil/kelas', [ProfilController::class, 'kelas'])->name('profil.kelas');
Route::get('/profil/kelas/{kelas}', [ProfilController::class, 'detailKelas'])->name('profil.kelas.detail');

// Route untuk halaman galeri
Route::get('/galeri/foto', [GaleriController::class, 'foto'])->name('galeri.foto');
Route::get('/galeri/video', [GaleriController::class, 'video'])->name('galeri.video');

// Route untuk halaman lomba
Route::get('/lomba/tulisan-motivasi', [LombaController::class, 'tulisanMotivasi'])->name('lomba.tulisan-motivasi');
Route::get('/lomba/bahasa-jawa', [LombaController::class, 'bahasaJawa'])->name('lomba.bahasa-jawa');
Route::get('/lomba/pai-seni-islami', [LombaController::class, 'paiSeniIslami'])->name('lomba.pai-seni-islami');

// Route untuk halaman kontak
Route::get('/hubungi-kami/kontak', [KontakController::class, 'index'])->name('kontak.index');

// Route untuk halaman kritik dan saran
Route::get('/hubungi-kami/kritik-saran', [KritikSaranController::class, 'index'])->name('kritik-saran.index');
Route::post('/hubungi-kami/kritik-saran', [KritikSaranController::class, 'store'])->name('kritik-saran.store');

// Route untuk halaman kurikulum
Route::get('/kurrikulum/sekolah', [KurikulumController::class, 'sekolah'])->name('kurikulum.sekolah');
Route::get('/kurrikulum/kalender', [KurikulumController::class, 'kalender'])->name('kurikulum.kalender');
Route::get('/kurrikulum/video', [KurikulumController::class, 'video'])->name('kurikulum.video');
Route::get('/kurikulum/download/{id}', [KurikulumController::class, 'download'])->name('kurikulum.download');

// Route untuk autentikasi
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // News Management
    Route::get('/news', [AdminNewsController::class, 'index'])->name('news.index');
    Route::post('/news', [AdminNewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [AdminNewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [AdminNewsController::class, 'destroy'])->name('news.delete');

    // Prestasi Management
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
    Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');
    Route::get('/prestasi/{id}/edit', [PrestasiController::class, 'edit'])->name('prestasi.edit');
    Route::put('/prestasi/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');
    Route::delete('/prestasi/{id}', [PrestasiController::class, 'destroy'])->name('prestasi.delete');

    // Gallery Management
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.delete');

    // Guru & Staff Management
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.delete');

    // Murid Management
    Route::get('/murid', [MuridController::class, 'index'])->name('murid.index');
    Route::post('/murid', [MuridController::class, 'store'])->name('murid.store');
    Route::get('/murid/{id}/edit', [MuridController::class, 'edit'])->name('murid.edit');
    Route::put('/murid/{id}', [MuridController::class, 'update'])->name('murid.update');
    Route::delete('/murid/{id}', [MuridController::class, 'destroy'])->name('murid.delete');

    // Kurikulum Management
    Route::get('/kurikulum', [AdminKurikulumController::class, 'index'])->name('kurikulum.index');
    Route::post('/kurikulum', [AdminKurikulumController::class, 'store'])->name('kurikulum.store');
    Route::get('/kurikulum/{id}/edit', [AdminKurikulumController::class, 'edit'])->name('kurikulum.edit');
    Route::put('/kurikulum/{id}', [AdminKurikulumController::class, 'update'])->name('kurikulum.update');
    Route::delete('/kurikulum/{id}', [AdminKurikulumController::class, 'destroy'])->name('kurikulum.delete');
    Route::get('/kurikulum/download/{id}', [KurikulumController::class, 'download'])->name('kurikulum.download');
});
