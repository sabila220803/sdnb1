@extends('layouts.app')

@section('content')
<div class="container py-4 mt-5">
    <div class="ekstrakurikuler-header text-center mb-4">
        <div class="btn btn-primary btn-lg px-4 py-2 rounded-pill shadow-lg">
            <h1 class="m-0 fs-2">GURU DAN STAFF</h1>
        </div>
    </div>
    {{-- <div class="container mt-4 mb-4">
        <div class="title-section py-3 rounded shadow" style="transform: translateY(5px); background-color: #3970BE;">
            <h1 class="text-center text-white mb-0" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2)2);">GURU DAN STAFF</h1>
        </div>
    </div> --}}
    
    <!-- Kepala Sekolah -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-4 col-sm-6 col-10">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body p-3">
                    <img src="{{ asset('images/guru/kepala-sekolah.jpg') }}" 
                         alt="Kepala Sekolah" 
                         class="img-fluid rounded-circle mb-3" 
                         style="width: 160px; height: 160px; object-fit: cover;">
                    <h4 class="card-title fs-5">Christina Ardiyanti, S.Pd</h4>
                    <p class="card-text">Kepala Sekolah</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid Guru dan Staff -->
    <div class="row g-4">
        @php
        $guruStaff = [
            ['nama' => 'Christina Ardiyanti, S.Pd', 'jabatan' => 'Kepala Sekolah', 'foto' => 'guru-1.jpg'],
            ['nama' => 'Christina Ardiyanti, S.Pd', 'jabatan' => 'Kepala Sekolah', 'foto' => 'guru-1.jpg'],
            ['nama' => 'Christina Ardiyanti, S.Pd', 'jabatan' => 'Kepala Sekolah', 'foto' => 'guru-1.jpg'],
            ['nama' => 'Christina Ardiyanti, S.Pd', 'jabatan' => 'Kepala Sekolah', 'foto' => 'guru-1.jpg'],
            ['nama' => 'Christina Ardiyanti, S.Pd', 'jabatan' => 'Kepala Sekolah', 'foto' => 'guru-1.jpg'],
            ['nama' => 'Christina Ardiyanti, S.Pd', 'jabatan' => 'Kepala Sekolah', 'foto' => 'guru-1.jpg'],
            ['nama' => 'Christina Ardiyanti, S.Pd', 'jabatan' => 'Kepala Sekolah', 'foto' => 'guru-1.jpg'],
            ['nama' => 'Christina Ardiyanti, S.Pd', 'jabatan' => 'Kepala Sekolah', 'foto' => 'guru-1.jpg'],
        ];
        @endphp

        @foreach($guruStaff as $guru)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
                <div class="card-body p-3 text-center">
                    <img src="{{ asset('images/guru/' . $guru['foto']) }}" 
                         alt="{{ $guru['nama'] }}" 
                         class="img-fluid rounded-circle mb-2" 
                         style="width: 120px; height: 120px; object-fit: cover;">
                    <h5 class="card-title fs-6 mb-1">{{ $guru['nama'] }}</h5>
                    <p class="card-text small">{{ $guru['jabatan'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@push('styles')
<style>
    .card {
        transition: transform 0.2s;
        border: none;
        border-radius: 12px;
    }

    .hover-card:hover {
        transform: translateY(-5px);
    }

    @media (max-width: 768px) {
        .container {
            padding-left: 15px;
            padding-right: 15px;
            margin-top: 4rem !important;
        }

        .btn-lg {
            padding-left: 2rem !important;
            padding-right: 2rem !important;
        }

        .card-body {
            padding: 1rem !important;
        }

        .card-title {
            font-size: 0.9rem !important;
        }

        .card-text {
            font-size: 0.8rem;
        }
    }
</style>
@endpush