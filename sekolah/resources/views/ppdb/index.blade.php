@extends('layouts.app')

@section('content')
<div class="ppdb-hero" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/sekolah-bg.jpg') }}') no-repeat center center; background-size: cover; height: 60vh; display: flex; align-items: center; justify-content: center;">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold mb-4">Penerimaan Peserta Didik Baru</h1>
        <h2 class="h3 mb-4">Tahun Ajaran 2024/2025</h2>
        <a href="https://wa.me/6288239274705" class="btn btn-primary btn-lg px-5 py-3 rounded-pill" target="_blank">Tanya Langsung</a>
    </div>
</div>

<div class="container py-5">
    <!-- Brosur Section -->
    <div class="text-center mb-5">
        <h2 class="section-title mb-4">Brosur PPDB</h2>
        <div class="brosur-container">
            <img src="{{ asset('images/ppdb/blue.jpg') }}" alt="Brosur PPDB" class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
        </div>
        <a href="{{ asset('images/ppdb/blue.jpg') }}" 
           class="btn btn-outline-primary mt-3" 
           target="_blank">Download Brosur</a>
    </div>

    <!-- Timeline Section -->
    <div class="timeline-section mb-5">
        <h2 class="section-title text-center mb-5">Timeline Pendaftaran</h2>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Pendaftaran Online</h4>
                    <p>1 - 30 Juni 2024</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Seleksi Berkas</h4>
                    <p>1 - 5 Juli 2024</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Pengumuman</h4>
                    <p>10 Juli 2024</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Daftar Ulang</h4>
                    <p>11 - 15 Juli 2024</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Persyaratan Section -->
    <div class="requirements-section mb-5">
        <h2 class="section-title text-center mb-4">Persyaratan Pendaftaran</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Usia 7 tahun pada 1 Juli 2024</li>
                            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Fotokopi Kartu Keluarga</li>
                            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Fotokopi Akte Kelahiran</li>
                            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Pas Foto 3x4 (2 lembar)</li>
                            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Surat Keterangan TK/PAUD</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Pendaftaran Section -->
    {{-- <div id="daftar" class="registration-section">
        <h2 class="section-title text-center mb-4">Formulir Pendaftaran</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="nama_ortu" class="form-label">Nama Orang Tua/Wali</label>
                                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" required>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="telepon" name="telepon" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">Kirim Pendaftaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('styles')
<style>
    .section-title {
        color: #333;
        font-weight: 600;
        margin-bottom: 2rem;
    }

    .timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        width: 2px;
        background: #4C902D;
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -1px;
    }

    .timeline-item {
        padding: 1rem 2rem;
        position: relative;
        background: #fff;
        border-radius: 6px;
        margin-bottom: 2rem;
        width: calc(50% - 2rem);
        margin-left: auto;
    }

    .timeline-item:nth-child(even) {
        margin-left: 0;
        margin-right: auto;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        background: #4C902D;
        border-radius: 50%;
        left: -10px;
        top: 50%;
        transform: translateY(-50%);
    }

    .timeline-item:nth-child(even)::before {
        left: auto;
        right: -10px;
    }

    .timeline-content {
        padding: 1rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .timeline-content h4 {
        color: #4C902D;
        margin-bottom: 0.5rem;
    }

    .btn-primary {
        background-color: #4C902D;
        border-color: #4C902D;
    }

    .btn-primary:hover {
        background-color: #3a6f22;
        border-color: #3a6f22;
    }

    .btn-outline-primary {
        color: #4C902D;
        border-color: #4C902D;
    }

    .btn-outline-primary:hover {
        background-color: #4C902D;
        color: white;
    }

    .card {
        border: none;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .form-control:focus {
        border-color: #4C902D;
        box-shadow: 0 0 0 0.2rem rgba(76, 144, 45, 0.25);
    }
</style>
@endpush