@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <h2 class="text-center mb-3">LOMBA MEMBUAT TULISAN MOTIVASI ATAU INSPIRATIF</h2>
    <div class="text-center mb-5">
        <p class="lead text-muted">"Menulis adalah seni mengabadikan inspirasi, mengubah kata menjadi kekuatan yang memotivasi"</p>
        <p class="description">Lomba ini bertujuan untuk mengembangkan kreativitas dan kemampuan menulis siswa dalam menciptakan karya yang dapat menginspirasi dan memotivasi orang lain. Mari bersama-sama menyebarkan energi positif melalui tulisan!</p>
    </div>
    
    <div class="row">
        <!-- Kolom Video YouTube -->
        <div class="col-lg-6 col-md-12 mb-4">
            <h4 class="section-title mb-4">Video Inspiratif Karya Siswa</h4>
            <div class="video-container mb-4">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/chUws9xu02k" title="Video Lomba 1" allowfullscreen></iframe>
                </div>
                <div class="video-caption mt-2">Karya Terbaik - Kategori Tulisan Motivasi</div>
            </div>
            <div class="video-container mb-5">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/A3KPUxkmW9E" title="Video Lomba 2" allowfullscreen></iframe>
                </div>
                <div class="video-caption mt-2">Karya Inspiratif - Kategori Tulisan Motivasi</div>
            </div>
        </div>
        
        <!-- Kolom Karya Lomba -->
        <div class="col-md-6">
            <h4 class="section-title mb-4">Karya Terbaik Siswa</h4>
            <div class="row g-4">
                <!-- Karya 1 -->
                <div class="col-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-badge">Juara 1</div>
                        <img src="{{ asset('images/lomba/karya1.jpg') }}" class="card-img-top" alt="Karya 1">
                        <div class="card-body">
                            <h5 class="card-title">Mega Aulia Putri</h5>
                            <p class="card-text mb-2">"Setiap langkah adalah kesempatan untuk menjadi lebih baik"</p>
                            <p class="card-info">Karya Lomba Tulisan Motivasi Atau Inspiratif SD 2021</p>
                        </div>
                    </div>
                </div>
                <!-- Karya 2 -->
                <div class="col-12">
                    <div class="card h-100 shadow-sm">
                        <div class="card-badge">Juara 2</div>
                        <img src="{{ asset('images/lomba/karya2.jpg') }}" class="card-img-top" alt="Karya 2">
                        <div class="card-body">
                            <h5 class="card-title">Valent Aqila Mahendra</h5>
                            <p class="card-text mb-2">"Belajar hari ini untuk masa depan yang lebih cerah"</p>
                            <p class="card-info">Karya Lomba Tulisan Motivasi Atau Inspiratif SD 2021</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.container {
    padding: 0 15px;
    max-width: 1400px;
}

.lead {
    font-size: 1.25rem;
    font-style: italic;
    color: #3970BE;
}

.description {
    max-width: 800px;
    margin: 0 auto;
    color: #666;
}

.section-title {
    color: #2c3e50;
    font-weight: 600;
    position: relative;
    padding-bottom: 10px;
}

.section-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: #3970BE;
}

.video-caption {
    color: #666;
    font-size: 0.9rem;
    text-align: center;
}

.card-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #3970BE;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-weight: 600;
    z-index: 1;
}

.card-info {
    font-size: 0.85rem;
    color: #888;
    margin-top: 10px;
}

@media (max-width: 768px) {
    .container {
        padding: 0 10px;
    }
    
    h2 {
        font-size: 1.5rem;
        padding: 0 10px;
    }
    
    .lead {
        font-size: 1.1rem;
        padding: 0 15px;
    }
    
    .description {
        font-size: 0.9rem;
        padding: 0 15px;
    }
}

.video-container {
    max-width: 100%;
    margin: 0 auto;
    transition: transform 0.4s ease-in-out;
}

.video-container:hover {
    transform: scale(1.02);
}

.card {
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    overflow: hidden;
    max-width: 100%;
    margin: 0 auto;
    border-radius: 15px;
    border: none;
    background: #ffffff;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(57, 112, 190, 0.2);
}

.card img {
    transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.card:hover img {
    transform: scale(1.08);
}

.card-body {
    padding: 1.5rem;
    background: linear-gradient(to bottom, rgba(255,255,255,0.8), rgba(255,255,255,1));
}

.card-title {
    color: #3970BE;
    font-weight: 700;
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
    position: relative;
    padding-bottom: 0.5rem;
}

.card-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background: #3970BE;
    transition: width 0.3s ease;
}

.card:hover .card-title:after {
    width: 100px;
}

.card-text {
    font-size: 1rem;
    color: #555;
    margin-bottom: 0;
    line-height: 1.6;
}

.ratio-16x9 {
    width: 100%;
    margin: 0 auto;
}

.ratio-16x9 iframe {
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    width: 100%;
    transition: all 0.4s ease;
}

.ratio-16x9:hover iframe {
    box-shadow: 0 12px 30px rgba(57, 112, 190, 0.25);
    transform: translateY(-5px);
}

@media (min-width: 992px) {
    .row {
        margin: 0 -20px;
    }
    
    .col-lg-6 {
        padding: 0 20px;
    }
    
    .video-container {
        margin-bottom: 40px;
    }
    
    .card {
        margin-bottom: 40px;
    }
}

@media (max-width: 768px) {
    .video-container {
        margin-bottom: 2rem;
    }
    
    .card {
        margin-bottom: 1.5rem;
    }
    
    .card-title {
        font-size: 1rem;
    }
    
    .card-text {
        font-size: 0.85rem;
    }
    
    .card img {
        height: 200px;
    }
}
</style>
@endsection