@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h2 class="text-center page-title mb-4">LOMBA MEMBUAT TULISAN MOTIVASI ATAU INSPIRATIF</h2>
            <div class="text-center mb-5">
                <p class="lead fw-bold">"Menulis adalah seni mengabadikan inspirasi, mengubah kata menjadi kekuatan yang memotivasi"</p>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center g-5">
        <!-- Kolom Video YouTube -->
        <div class="col-lg-6 col-md-12">
            <h4 class="section-title text-center mb-4">Video Inspiratif Karya Siswa</h4>
            <div class="video-container mb-5">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/chUws9xu02k" title="Video Lomba 1" allowfullscreen></iframe>
                </div>
                <div class="video-caption text-center">Karya Terbaik - Kategori Tulisan Motivasi</div>
            </div>
            <div class="video-container mt-8" style="margin-top: 5rem !important;">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/A3KPUxkmW9E" title="Video Lomba 2" allowfullscreen></iframe>
                </div>
                <div class="video-caption text-center">Karya Inspiratif - Kategori Tulisan Motivasi</div>
            </div>
        </div>
        
        <!-- Kolom Karya Lomba -->
        <div class="col-lg-6 col-md-12">
            <h4 class="section-title text-center mb-4">Karya Terbaik Siswa</h4>
            <div class="row g-4 justify-content-center">
                <!-- Karya 1 -->
                <div class="col-12">
                    <div class="card h-100">
                        <div class="card-badge">Juara 1</div>
                        <img src="{{ asset('images/lomba/karya1.jpg') }}" class="card-img-top" alt="Karya 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Mega Aulia Putri</h5>
                            <p class="card-info">Karya Lomba Tulisan Motivasi Atau Inspiratif SD 2021</p>
                        </div>
                    </div>
                </div>
                <!-- Karya 2 -->
                <div class="col-12">
                    <div class="card h-100">
                        <div class="card-badge">Juara 2</div>
                        <img src="{{ asset('images/lomba/karya2.jpg') }}" class="card-img-top" alt="Karya 2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Valent Aqila Mahendra</h5>
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
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.page-title {
    font-size: 2.25rem;
    font-weight: 700;
    color: #2c3e50;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 2rem;
    position: relative;
    display: inline-block;
}

.page-title:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(to right, #3970BE, #64B5F6);
    border-radius: 2px;
}

.lead {
    font-size: 1.5rem;
    color: #3970BE;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.description {
    max-width: 800px;
    color: #555;
    font-size: 1.1rem;
    line-height: 1.8;
    margin-bottom: 3rem;
}

.section-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 2rem;
    position: relative;
    display: inline-block;
}

.section-title:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: linear-gradient(to right, #3970BE, #64B5F6);
    border-radius: 2px;
}

.video-container {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 2rem;
}

.video-container:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.video-caption {
    background: #f8f9fa;
    color: #2c3e50;
    font-size: 1rem;
    font-weight: 500;
    padding: 1rem;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 2rem;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.card-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: linear-gradient(45deg, #3970BE, #64B5F6);
    color: white;
    padding: 0.5rem 1.25rem;
    border-radius: 25px;
    font-weight: 600;
    font-size: 1rem;
    letter-spacing: 1px;
    z-index: 10;
    box-shadow: 0 2px 10px rgba(57, 112, 190, 0.2);
}

.card-img-top {
    height: 250px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.card:hover .card-img-top {
    transform: scale(1.05);
}

.card-body {
    padding: 1.5rem;
    background: white;
}

.card-title {
    color: #2c3e50;
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.card-text {
    color: #3970BE;
    font-size: 1.1rem;
    font-style: italic;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.card-info {
    color: #666;
    font-size: 0.9rem;
    padding-top: 1rem;
    border-top: 1px solid #eee;
}

@media (max-width: 768px) {
    .container {
        padding: 1rem;
    }

    .page-title {
        font-size: 1.75rem;
    }

    .lead {
        font-size: 1.25rem;
    }

    .description {
        font-size: 1rem;
        margin-bottom: 2rem;
    }

    .section-title {
        font-size: 1.5rem;
    }

    .video-container {
        margin-bottom: 1.5rem;
    }

    .card-img-top {
        height: 200px;
    }

    .card-body {
        padding: 1.25rem;
    }

    .card-title {
        font-size: 1.1rem;
    }

    .card-text {
        font-size: 1rem;
    }
}
</style>
@endsection