
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

// Route untuk halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk halaman berita
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');

// Route untuk halaman profil
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/visi-misi', [ProfilController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/guru-staff', [ProfilController::class, 'guruStaff'])->name('profil.guru-staff');
Route::get('/profil/ekstrakurikuler', [ProfilController::class, 'ekstrakurikuler'])->name('profil.ekstrakurikuler');
Route::get('/profil/prestasi', [ProfilController::class, 'prestasi'])->name('profil.prestasi');
Route::get('/profil/kelas', [ProfilController::class, 'kelas'])->name('profil.kelas');
Route::get('/profil/kelas/{id}', [ProfilController::class, 'detailKelas'])->name('profil.kelas.detail');

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