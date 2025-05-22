@extends('layouts.app')

@section('content')
<div class="berita-page-section">
    <div class="container py-5">
        <h2 class="berita-page-title text-center mb-5">Berita Sekolah</h2>
        <div class="berita-page-wrapper">
            @foreach($news as $item)
            <div class="berita-page-item">
                <div class="berita-page-image">
                    <img src="{{ asset($item['gambar']) }}" alt="{{ $item['judul'] }}">
                </div>
                <div class="berita-page-content">
                    <div class="berita-page-date">{{ $item['tanggal'] }}</div>
                    <h3 class="berita-page-heading">{{ $item['judul'] }}</h3>
                    <a href="{{ $item['link'] }}" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection