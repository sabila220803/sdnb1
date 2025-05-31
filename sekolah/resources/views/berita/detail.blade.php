@extends('layouts.app')

@section('content')
<div class="berita-detail-section">
    <div class="container py-5">
        <div class="berita-detail-header mb-4">
            <h1 class="berita-detail-title">{{ $berita['judul'] }}</h1>
            <div class="berita-detail-meta">
                <span class="berita-detail-date">{{ $berita['tanggal'] }}</span>
                <span class="berita-detail-divider">|</span>
                <span class="berita-detail-author">Admin SDN Bandarharjo 1</span>
            </div>
        </div>
        
        <div class="berita-detail-content">
            <div class="berita-detail-image mb-4">
                <img src="{{ asset($berita['gambar']) }}" alt="{{ $berita['judul'] }}" class="img-fluid rounded">
            </div>
            
            <div class="berita-detail-text">
                {!! $berita['konten'] !!}
            </div>
        </div>
        
        <div class="berita-detail-navigation mt-5">
            <a href="{{ route('berita.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</div>

<style>
    .berita-detail-section {
        background-color: #f8f9fa;
        padding: 2rem 0;
    }
    
    .berita-detail-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #3970be;
        margin-bottom: 1rem;
    }
    
    .berita-detail-meta {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 2rem;
    }
    
    .berita-detail-date, .berita-detail-author {
        font-weight: 500;
    }
    
    .berita-detail-divider {
        margin: 0 0.5rem;
    }
    
    .berita-detail-image img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .berita-detail-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #343a40;
    }
    
    .berita-detail-text p {
        margin-bottom: 1.5rem;
    }
    
    .berita-detail-navigation {
        display: flex;
        justify-content: space-between;
        border-top: 1px solid #dee2e6;
        padding-top: 2rem;
    }
    
    @media (max-width: 768px) {
        .berita-detail-title {
            font-size: 2rem;
        }
        
        .berita-detail-text {
            font-size: 1rem;
        }
    }
</style>
@endsection