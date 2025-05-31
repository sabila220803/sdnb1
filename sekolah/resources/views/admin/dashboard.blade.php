@extends('layouts.app')

@section('content')
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header d-flex justify-content-between align-items-center py-3"
                        style="background-color: #3970be;">
                        <h3 class="ps-2 mb-0 text-white fw-bold">Dashboard Admin</h3>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm">
                                <i class="fas fa-sign-out-alt me-1"></i> Logout
                            </button>
                        </form>
                    </div>
                    <div class="card-body p-4">
                        <h4 class="mb-4">Menu Utama</h4>

                        <div class="row g-4">
                            <!-- Menu Item 1 -->
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm hover-card">
                                    <div class="card-body text-center p-4">
                                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                                            <i class="fas fa-newspaper fa-2x text-primary"></i>
                                        </div>
                                        <h5 class="card-title">Kelola Berita</h5>
                                        <p class="card-text">Tambah, edit, dan hapus berita sekolah</p>
                                        <a href="{{ route('admin.news.index') }}" class="btn btn-primary mt-2">Akses</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Item 2 -->
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm hover-card">
                                    <div class="card-body text-center p-4">
                                        <div class="rounded-circle bg-success bg-opacity-10 p-3 d-inline-flex mb-3">
                                            <i class="fas fa-trophy fa-2x text-success"></i>
                                        </div>
                                        <h5 class="card-title">Kelola Prestasi</h5>
                                        <p class="card-text">Tambah, edit, dan hapus prestasi siswa</p>
                                        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-success mt-2">Akses</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Item 3 -->
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm hover-card">
                                    <div class="card-body text-center p-4">
                                        <div class="rounded-circle bg-warning bg-opacity-10 p-3 d-inline-flex mb-3">
                                            <i class="fas fa-images fa-2x text-warning"></i>
                                        </div>
                                        <h5 class="card-title">Kelola Galeri</h5>
                                        <p class="card-text">Tambah, edit, dan hapus foto</p>
                                        <a href="{{ route('admin.gallery.index') }}"
                                            class="btn btn-warning mt-2 text-white">Akses</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Item 4 -->
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm hover-card">
                                    <div class="card-body text-center p-4">
                                        <div class="rounded-circle bg-danger bg-opacity-10 p-3 d-inline-flex mb-3">
                                            <i class="fas fa-users fa-2x text-danger"></i>
                                        </div>
                                        <h5 class="card-title">Kelola Guru & Staff</h5>
                                        <p class="card-text">Tambah, edit, dan hapus data guru dan staff</p>
                                        <a href="{{ route('admin.guru.index') }}" class="btn btn-danger mt-2">Akses</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Item 5 -->
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm hover-card">
                                    <div class="card-body text-center p-4">
                                        <div class="rounded-circle bg-secondary bg-opacity-10 p-3 d-inline-flex mb-3">
                                            <i class="fas fa-graduation-cap fa-2x text-secondary"></i>
                                        </div>
                                        <h5 class="card-title">Kelola Murid</h5>
                                        <p class="card-text">Tambah, edit, dan hapus data murid</p>
                                        <a href="{{ route('admin.murid.index') }}" class="btn btn-secondary mt-2">Akses</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Item 6 -->
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm hover-card">
                                    <div class="card-body text-center p-4">
                                        <div class="rounded-circle bg-info bg-opacity-10 p-3 d-inline-flex mb-3">
                                            <i class="fas fa-calendar-alt fa-2x text-info"></i>
                                        </div>
                                        <h5 class="card-title">Kelola Kalender Pendidikan</h5>
                                        <p class="card-text">Tambah, edit, dan hapus Kalender Pendidikan</p>
                                        <a href="{{ route('admin.kurikulum.index') }}" class="btn btn-info mt-2">Akses</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
    </style>
@endsection
