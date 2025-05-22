@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="text-center mb-5">LOMBA MATA PELAJARAN PAI DAN SENI ISLAMI</h1>
            
            <!-- Bagian Materi Lomba Murojaah -->
            <div class="card mb-5">
                <div class="card-body">
                    <h2 class="card-title mb-4">MATERI LOMBA MUROJAAH</h2>
                    <p class="text-center mb-4">Al-Qur'an surat al-Hujurat ayat 11 dan 13</p>
                    
                    <!-- Ayat Al-Qur'an -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/lomba/pai/ayat-quran.jpg') }}" alt="Ayat Al-Quran" class="img-fluid mb-4" style="max-width: 100%; height: auto;">
                    </div>
                    
                    <!-- Terjemahan -->
                    <div class="bg-light p-4 rounded">
                        <h4 class="mb-3">Terjemah al-Qur'an Surah al-Hujurat ayat 11 & 13</h4>
                        <p class="mb-4">"Wahai orang-orang yang beriman! Janganlah suatu kaum mengolok-olok kaum yang lain (karena) boleh jadi mereka (yang diperolok-olokkan) lebih baik dari mereka (yang mengolok-olok) dan jangan pula perempuan-perempuan (mengolok-olokkan) perempuan lain (karena) boleh jadi perempuan (yang diperolok-olokkan) lebih baik dari perempuan (yang mengolok-olok). Janganlah kamu saling mencela satu sama lain dan janganlah saling memanggil dengan gelar-gelar yang buruk. Seburuk-buruk panggilan adalah (panggilan) yang buruk (fasik) setelah beriman. Dan barangsiapa tidak bertobat, maka mereka itulah orang-orang yang zalim." (11)</p>
                        <p>"Wahai manusia! Sungguh, Kami telah menciptakan kamu dari seorang laki-laki dan seorang perempuan, kemudian Kami jadikan kamu berbangsa-bangsa dan bersuku-suku agar kamu saling mengenal. Sesungguhnya yang paling mulia di antara kamu di sisi Allah ialah orang yang paling bertakwa. Sungguh, Allah Maha Mengetahui, Mahateliti." (13)</p>
                    </div>
                </div>
            </div>
            
            <!-- Link Materi Lengkap -->
            <div class="text-center mb-5">
                <h3 class="mb-3">MATERI LOMBA MAPSI</h3>
                <a href="#" class="btn btn-primary btn-lg">Download Materi Lengkap (Google Drive)</a>
            </div>
            
            <!-- Video YouTube -->
            <div class="ratio ratio-16x9 mb-5">
                <iframe src="https://www.youtube.com/embed/Cr4yGzYWT1M?si=-KOMZZK_rhNAaBeT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border: none;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    
    .card-title {
        color: #3970BE;
        font-weight: bold;
        text-align: center;
    }
    
    .bg-light {
        background-color: #f8f9fa;
    }
    
    .btn-primary {
        background-color: #3970BE;
        border-color: #3970BE;
        padding: 10px 30px;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #2c5a9e;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(57,112,190,0.3);
    }
</style>
@endpush