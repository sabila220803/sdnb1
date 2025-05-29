@extends('layouts.app')

@section('content')
<div class="container my-5 py-5">
    <h2 class="text-center mb-4">Galeri Foto</h2>
    <div class="row g-4">
        <!-- Foto 1 -->
        <div class="col-md-4 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
                <img src="{{ asset('images/galeri/foto1.jpg') }}" class="card-img-top" alt="Foto Kegiatan 1">
                <div class="card-body">
                    <h5 class="card-title">Kegiatan Sekolah</h5>
                    <p class="card-text">Dokumentasi kegiatan belajar mengajar di sekolah.</p>
                </div>
            </div>
        </div>

        <!-- Foto 2 -->
        <div class="col-md-4 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
                <img src="{{ asset('images/galeri/foto2.jpg') }}" class="card-img-top" alt="Foto Kegiatan 2">
                <div class="card-body">
                    <h5 class="card-title">Kegiatan Ekstrakurikuler</h5>
                    <p class="card-text">Kegiatan pengembangan bakat dan minat siswa.</p>
                </div>
            </div>
        </div>

        <!-- Foto 3 -->
        <div class="col-md-4 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
                <img src="{{ asset('images/galeri/foto3.jpg') }}" class="card-img-top" alt="Foto Kegiatan 3">
                <div class="card-body">
                    <h5 class="card-title">Prestasi Siswa</h5>
                    <p class="card-text">Pencapaian dan prestasi siswa dalam berbagai bidang.</p>
                </div>
            </div>
        </div>

        <!-- Foto 4 -->
        <div class="col-md-4 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
                <img src="{{ asset('images/galeri/foto4.jpg') }}" class="card-img-top" alt="Foto Kegiatan 4">
                <div class="card-body">
                    <h5 class="card-title">Kegiatan Olahraga</h5>
                    <p class="card-text">Aktivitas olahraga dan kesehatan siswa.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2) !important;
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.card-title {
    color: #3970BE;
    margin-bottom: 0.5rem;
}

.card-text {
    color: #666;
    font-size: 0.9rem;
}
</style>
@endsection