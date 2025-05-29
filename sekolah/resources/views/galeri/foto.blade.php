@extends('layouts.app')

@push('styles')
    <style>
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        .showing-entries {
            color: #6c757d;
            font-size: 0.875rem;
        }

        .pagination {
            margin: 0;
        }

        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
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
@endpush

@section('content')
    <div class="container my-5 py-5">
        <h2 class="text-center mb-4">Galeri Foto</h2>
        <div class="row g-4">
            @foreach ($galleries as $gallery)
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow-sm hover-card">
                        <x-cloudinary::image public-id="{{ $gallery->public_id }}" width="120" height="120" loading="lazy"
                            class="card-img-top" style="width: 120px; height: 120px; object-fit: cover;"
                            alt="{{ ucwords($gallery->judul) }}" />
                        {{-- <img src="{{ asset('images/galeri/foto1.jpg') }}" class="card-img-top" alt="Foto Kegiatan 1"> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ ucwords($gallery->judul) }}</h5>
                            <p class="card-text">{{ $gallery->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination-container">
            <div class="showing-entries">
                Menampilkan <b>{{ $galleries->firstItem() }}</b> sampai <b>{{ $galleries->lastItem() }}</b> dari
                <b>{{ $galleries->total() }}</b>
                data
            </div>
            <div class="pagination">
                {{ $galleries->onEachSide(1)->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
