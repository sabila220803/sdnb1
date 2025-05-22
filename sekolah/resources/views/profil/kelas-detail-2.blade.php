@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Title Section -->
    <div class="ekstrakurikuler-header text-center mb-5">
        <div class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-lg">
            <h1 class="m-0">Daftar Siswa Kelas II SDN Bandarharjo 01</h1>
        </div>
    </div>

    <!-- Student Count Info -->
    <div class="text-center mb-4">
        <h4>Jumlah Seluruh Siswa = 25 Siswa</h4>
        <h5>Jumlah Siswa Laki-laki = 12 Siswa</h5>
    </div>

    <!-- Male Students Grid -->
    <h4 class="text-center mb-4">Siswa Laki-laki</h4>
    <div class="row g-4 mb-5">
        @foreach($dataSiswaLaki as $siswa)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ asset('images/siswa/laki.png') }}" alt="Foto Siswa" class="img-fluid" style="height: 200px; object-fit: contain;">
                    </div>
                    <h5 class="card-title">{{ $siswa }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mb-4">
        <h5>Jumlah Siswi Perempuan = 13 Siswi</h5>
    </div>

    <!-- Female Students Grid -->
    <h4 class="text-center mb-4">Siswi Perempuan</h4>
    <div class="row g-4">
        @foreach($dataSiswaPerempuan as $siswi)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ asset('images/siswa/perempuan.png') }}" alt="Foto Siswi" class="img-fluid" style="height: 200px; object-fit: contain;">
                    </div>
                    <h5 class="card-title">{{ $siswi }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Back Button -->
    <div class="text-center mt-5">
        <a href="{{ route('profil.kelas') }}" class="btn btn-primary px-4">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

@endsection