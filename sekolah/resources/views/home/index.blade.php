@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
@endpush

@section('content')
<div class="hero-section">
    <div class="hero-content">
        <div class="content-wrapper">
            <div class="text-content" data-aos="fade-right" data-aos-delay="100">
                <h1 class="school-title">{{ $schoolData['nama_sekolah'] }}</h1>
                <h2 class="city-title">{{ $schoolData['kota'] }}</h2>
                <p class="school-motto">{{ $schoolData['motto'] }}</p>
            </div>
            <div class="illustration-content" data-aos="fade-left" data-aos-delay="300">
                <div class="illustration-container">
                    <img src="{{ asset('images/illustration.png') }}" alt="School Illustration">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sambutan-section">
    <div class="container py-5">
        <div class="sambutan-wrapper">
            <div class="sambutan-image" data-aos="fade-right" data-aos-delay="100">
                <img src="{{ asset($schoolData['kepala_sekolah']['foto']) }}" alt="Kepala Sekolah" class="kepsek-img">
                <div class="kepsek-info text-center mt-3">
                    <h4 class="mb-0">{{ $schoolData['kepala_sekolah']['nama'] }}</h4>
                    <p class="text-muted">{{ $schoolData['kepala_sekolah']['jabatan'] }}</p>
                </div>
            </div>
            <div class="sambutan-content" data-aos="fade-left" data-aos-delay="300">
                <h3 class="sambutan-title">Sambutan Kepala Sekolah</h3>
                @foreach($schoolData['kepala_sekolah']['sambutan'] as $paragraf)
                    <p class="sambutan-text">{{ $paragraf }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>



<div class="program-section">
    <div class="container py-5">
        <h2 class="program-title text-center mb-5" data-aos="fade-up">Program Unggulan</h2>
        <div class="program-wrapper">
            <div class="program-list">
                @foreach($programs as $program)
                <div class="program-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="#" class="program-link">{{ $program['nama'] }}</a>
                </div>
                @endforeach
            </div>
            <div class="program-illustration" data-aos="fade-left" data-aos-delay="400">
                <img src="{{ asset('images/students.png') }}" alt="Program Illustration">
            </div>
        </div>
    </div>
</div>



<div class="prestasi-section">
    <div class="container py-5">
        <h2 class="prestasi-title text-center mb-5" data-aos="fade-up">Prestasi</h2>
        <div class="prestasi-carousel">
            <div class="prestasi-wrapper">
                @foreach($achievements as $achievement)
                <div class="prestasi-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <img src="{{ asset($achievement['foto']) }}" alt="Prestasi {{ $achievement['nama'] }}">
                    <h4>{{ $achievement['nama'] }}</h4>
                    <p>{{ $achievement['prestasi'] }}</p>
                </div>
                @endforeach
            </div>
            <div class="prestasi-nav prestasi-prev">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="prestasi-nav prestasi-next">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </div>
</div>
<div class="berita-section">
    <div class="container py-5">
        <h2 class="berita-title text-center mb-5" data-aos="fade-up">Berita</h2>
        <div class="berita-wrapper">
            @foreach($news as $item)
            <div class="berita-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="berita-image">
                    <img src="{{ asset($item['gambar']) }}" alt="{{ $item['judul'] }}">
                </div>
                <div class="berita-content">
                    <div class="berita-date">{{ $item['tanggal'] }}</div>
                    <h3 class="berita-heading">{{ $item['judul'] }}</h3>
                    <a href="{{ $item['link'] }}" class="btn btn-primary">Baca Selengkapnya</a>
                    {{-- <a href="{{ $item['link'] }}" class="btn btn-primary">Baca more</a> --}}
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('berita.index') }}" class="btn btn-outline-primary btn-lg">Berita Lainnya !!!</a>
        </div>
    </div>
</div>
@endsection