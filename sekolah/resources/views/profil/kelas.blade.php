@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Daftar Siswa per Kelas SDN Bandarharjo 01</h1>
    
    <!-- Navigation Buttons -->
    <div class="d-flex justify-content-center flex-wrap mb-5 gap-3">
        <a href="#kelas1" class="btn btn-primary px-4">Kelas I</a>
        <a href="#kelas2" class="btn btn-primary px-4">Kelas II</a>
        <a href="#kelas3" class="btn btn-primary px-4">Kelas III</a>
        <a href="#kelas4" class="btn btn-primary px-4">Kelas IV</a>
        <a href="#kelas5" class="btn btn-primary px-4">Kelas V</a>
        <a href="#kelas6" class="btn btn-primary px-4">Kelas VI</a>
    </div>

    <!-- Class Cards Grid -->
    <div class="row g-4">
        <!-- Kelas I -->
        <div class="col-md-4" id="kelas1">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ asset('images/kelas/bintang.png') }}" alt="Logo Kelas I" class="img-fluid" style="height: 150px;">
                    </div>
                    <h3 class="card-title">Kelas I</h3>
                    <a href="{{ route('profil.kelas.detail', 1) }}" class="btn btn-outline-primary mt-3">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Kelas II -->
        <div class="col-md-4" id="kelas2">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ asset('images/kelas/rantai.png') }}" alt="Logo Kelas II" class="img-fluid" style="height: 150px;">
                    </div>
                    <h3 class="card-title">Kelas II</h3>
                    <a href="{{ route('profil.kelas.detail', 2) }}" class="btn btn-outline-primary mt-3">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Kelas III -->
        <div class="col-md-4" id="kelas3">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ asset('images/kelas/beringin.png') }}" alt="Logo Kelas III" class="img-fluid" style="height: 150px;">
                    </div>
                    <h3 class="card-title">Kelas III</h3>
                    <a href="{{ route('profil.kelas.detail', 3) }}" class="btn btn-outline-primary mt-3">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Kelas IV -->
        <div class="col-md-4" id="kelas4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ asset('images/kelas/banteng.png') }}" alt="Logo Kelas IV" class="img-fluid" style="height: 150px;">
                    </div>
                    <h3 class="card-title">Kelas IV</h3>
                    <a href="{{ route('profil.kelas.detail', 4) }}" class="btn btn-outline-primary mt-3">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Kelas V -->
        <div class="col-md-4" id="kelas5">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ asset('images/kelas/padikapas.png') }}" alt="Logo Kelas V" class="img-fluid" style="height: 150px;">
                    </div>
                    <h3 class="card-title">Kelas V</h3>
                    <a href="{{ route('profil.kelas.detail', 5) }}" class="btn btn-outline-primary mt-3">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Kelas VI -->
        <div class="col-md-4" id="kelas6">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ asset('images/kelas/garuda.png') }}" alt="Logo Kelas VI" class="img-fluid" style="height: 150px;">
                    </div>
                    <h3 class="card-title">Kelas VI</h3>
                    <a href="{{ route('profil.kelas.detail', 6) }}" class="btn btn-outline-primary mt-3">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: transform 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-5px);
}

.btn-primary {
    background-color: #3970BE;
    border-color: #3970BE;
}

.btn-outline-primary {
    color: #3970BE;
    border-color: #3970BE;
}

.btn-outline-primary:hover {
    background-color: #3970BE;
    color: white;
}
</style>
@endsection