@extends('layouts.app')
@push('styles')
    <style>
        .claudinary{
            height: 200px;
            width: 134px;
            object-fit: cover;
        }
    </style>
@section('content')
    <div class="container py-5">
        <!-- Title Section -->
        <div class="ekstrakurikuler-header text-center mb-5">
            <div class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-lg">
                <h1 class="m-0">Daftar Siswa Kelas {{ $kelas }} SDN Bandarharjo 01</h1>
            </div>
        </div>
        {{-- <div class="title-section py-3 rounded shadow mb-5" style="transform: translateY(5px); background-color: #3970BE;">
        <h1 class="text-center text-white mb-0" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">Daftar Siswa Kelas I SDN Bandarharjo 01</h1>
    </div> --}}

        <!-- Student Count Info -->
        <div class="text-center mb-4">
            <h4>Jumlah Seluruh Siswa = {{ count($siswas) }} Siswa</h4>
            <h5>Jumlah Siswa Laki-laki = {{ count($siswas->where('jenis_kelamin', 'L')) }} Siswa</h5>
        </div>
        
        <!-- Male Students Grid -->
        <h4 class="text-center mb-4">Siswa Laki-laki</h4>
        <div class="row g-4 mb-5">
            @foreach ($siswas->where('jenis_kelamin', 'L') as $siswa)
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                @if ($siswa->public_id)
                                    <x-cloudinary::image public-id="{{ $siswa->public_id }}"
                                        transformation="c_fill,h_200,w_134,g_face,q_auto" loading="lazy"
                                        class="claudinary rounded mx-auto d-block"
                                        style="width: 134px; height: 200px; object-fit: cover; display: block;" />
                                @else
                                    <img src="{{ asset('images/siswa/laki.png') }}" alt="Foto Siswa" class="img-fluid"
                                        style="height: 200px; object-fit: contain;">
                                @endif
                            </div>
                            <h5 class="card-title">{{ ucwords($siswa->nama) }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mb-4">
            <h5>Jumlah Siswi Perempuan = {{ count($siswas->where('jenis_kelamin', 'P')) }} Siswi</h5>
        </div>

        <!-- Female Students Grid -->
        <h4 class="text-center mb-4">Siswi Perempuan</h4>
        <div class="row g-4">
            @foreach ($siswas->where('jenis_kelamin', 'P') as $siswi)
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                @if ($siswi->public_id)
                                    <x-cloudinary::image public-id="{{ $siswi->public_id }}"
                                        transformation="c_fill,h_200,w_134,g_face,q_auto" loading="lazy"
                                        class="claudinary rounded mx-auto d-block"
                                        style="width: 134px; height: 200px; object-fit: cover; display: block;" />
                                @else
                                    <img src="{{ asset('images/siswa/perempuan.png') }}" alt="Foto Siswi" class="img-fluid"
                                        style="height: 200px; object-fit: contain;">
                                @endif
                            </div>
                            <h5 class="card-title">{{ ucwords($siswi->nama)}}</h5>
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
