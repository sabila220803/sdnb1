@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <h1 class="text-center mb-4">LOMBA BAHASA JAWA 2021</h1>
    
    <div class="intro-text text-center mb-5">
        <p class="lead">"Nguri-uri kabudayan Jawi, nyengkuyung adiluhunging budaya bangsa"</p>
        <p class="description">Lomba Bahasa Jawa ing SDN Bandarharjo 01 minangka wujud upaya kanggo nglestareaken budaya Jawi lan ningkataken kaprigelan siswa ing bab basa lan sastra Jawa. Lomba iki kaperang dadi telung jinis, yaiku Geguritan, Macapat, lan Sesorah.</p>
    </div>

    <div class="row justify-content-center g-4">
        <!-- Geguritan -->
        <div class="col-lg-4 col-md-6">
            <div class="video-card h-100">
                <div class="ratio ratio-16x9 mb-3">
                    <iframe src="https://www.youtube.com/embed/KippdyQTeWw" title="Geguritan Piweling" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="card-content">
                    <h5 class="video-title">GEGURITAN "PIWELING"</h5>
                    <p class="performer-name">Freda Putri Alexsi</p>
                    <div class="category-badge">SDN BANDARHARJO 01</div>
                    <p class="video-description">Geguritan utawi puisi Jawa kang ngemot pitutur luhur kanggo para mudha.</p>
                </div>
            </div>
        </div>

        <!-- Macapat -->
        <div class="col-lg-4 col-md-6">
            <div class="video-card h-100">
                <div class="ratio ratio-16x9 mb-3">
                    <iframe src="https://www.youtube.com/embed/Mv8MtP_SFAM" title="Nembang Gambuh" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="card-content">
                    <h5 class="video-title">NEMBANG GAMBUH</h5>
                    <p class="performer-name">Air Langga</p>
                    <div class="category-badge">SDN BANDARHARJO 01</div>
                    <p class="video-description">Tembang macapat Gambuh kang ngemot piwulang becik kanggo urip ing bebrayan.</p>
                </div>
            </div>
        </div>

        <!-- Sesorah -->
        <div class="col-lg-4 col-md-6">
            <div class="video-card h-100">
                <div class="ratio ratio-16x9 mb-3">
                    <iframe src="https://www.youtube.com/embed/9ByVsH_HBlA" title="Sesorah Covid 19" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="card-content">
                    <h5 class="video-title">SESORAH COVID 19</h5>
                    <p class="performer-name">Putra Abdulloh Huda</p>
                    <div class="category-badge">SDN BANDARHARJO 01</div>
                    <p class="video-description">Sesorah utawi pidato basa Jawa ngenani pandemi Covid-19 lan carane njaga kasarasan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.intro-text {
    max-width: 800px;
    margin: 0 auto;
}

.lead {
    font-size: 1.5rem;
    font-weight: 500;
    color: #2c3e50;
    font-style: italic;
    margin-bottom: 1rem;
}

.description {
    color: #666;
    font-size: 1.1rem;
    line-height: 1.6;
}

.video-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    padding: 15px;
}

.video-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.ratio {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.card-content {
    padding: 1.25rem 0.5rem;
}

.video-title {
    color: #2c3e50;
    font-weight: 700;
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
    position: relative;
}

.performer-name {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 0.5rem;
}

.category-badge {
    display: inline-block;
    background: #3970BE;
    color: white;
    padding: 0.35rem 1rem;
    border-radius: 50px;
    font-size: 0.9rem;
    margin-bottom: 0.75rem;
}

.video-description {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .lead {
        font-size: 1.25rem;
    }
    
    .description {
        font-size: 1rem;
    }
    
    .video-card {
        margin-bottom: 1.5rem;
    }
}
</style>
@endsection