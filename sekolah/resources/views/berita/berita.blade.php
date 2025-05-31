@extends('layouts.app')
@push('styles')
    <style>
        .news {
            width: 250px;
            height: 200px;
            object-fit: cover;
        }
    </style>
@endpush
@section('content')
    <div class="berita-page-section">
        <div class="container py-5">
            <h2 class="berita-page-title text-center mb-5">Berita Sekolah</h2>
            <div class="berita-page-wrapper">
                @foreach ($news as $item)
                    <div class="berita-page-item">
                        <div class="berita-page-image">
                            <x-cloudinary::image public-id="{{ $item->public_id }}" alt="News {{ ucwords($item->judul) }}"
                                transformation="c_fill,h_200,w_223,g_face,q_auto" loading="lazy"
                                class="news img-fluid rounded mx-auto d-block"
                                style="width: 223px; height: 200px; object-fit: cover; display: block;" />
                        </div>
                        <div class="berita-page-content">
                            <div class="berita-page-date">{{ $item->created_at->format('d M Y') }}</div>
                            <h3 class="berita-page-heading">{{ $item->judul }}</h3>
                            <a href="{{ route('berita.show', $item->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
