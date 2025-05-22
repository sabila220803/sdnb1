@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Visi Section with Parallax Effect -->
            <div class="visi-section mb-5 position-relative overflow-hidden" style="height: 300px;">
                <div class="parallax-bg" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); height: 100%; transform: translateZ(-1px) scale(2);"></div>
                <div class="position-absolute top-50 start-50 translate-middle text-center text-white w-100 px-4">
                    <h2 class="display-4 mb-4 fw-bold animate-fade-in">VISI</h2>
                    <p class="lead mb-0 animate-slide-up" style="font-size: 1.3rem; line-height: 1.6;">
                        "Terwujudnya peserta didik yang <span class="highlight">Bertaqwa</span>, <span class="highlight">Santun</span>, <span class="highlight">Terampil</span>, <span class="highlight">Cerdas</span>, <span class="highlight">Berprestasi</span>, <span class="highlight">Ramah</span> Serta <span class="highlight">Berwawasan Budaya Lingkungan</span>"
                    </p>
                </div>
            </div>

            <!-- Misi Section with Cards -->
            <div class="card visi-misi-card shadow-lg border-0">
                <div class="card-body p-5">
                    <h2 class="text-center mb-5 position-relative">
                        <span class="border-bottom border-primary border-3 pb-2">MISI</span>
                    </h2>
                    <div class="mission-list">
                        <div class="mission-item mb-4 d-flex align-items-start">
                            <div class="mission-icon me-3">
                                <i class="fas fa-pray text-primary fa-2x"></i>
                            </div>
                            <div class="mission-content">
                                <p class="mb-0">1. Melaksanakan pendidikan dan pembelajaran untuk mengembangkan ketaqwaan terhadap Tuhan Yang Maha Esa</p>
                            </div>
                        </div>
                        <div class="mission-item mb-4 d-flex align-items-start">
                            <div class="mission-icon me-3">
                                <i class="fas fa-hands text-primary fa-2x"></i>
                            </div>
                            <div class="mission-content">
                                <p class="mb-0">2. Menumbuhkan budaya tertib, disiplin, santun dalam ucapan, sopan dalam perilaku terhadap sesama berdasarkan iman dan taqwa</p>
                            </div>
                        </div>
                        <div class="mission-item mb-4 d-flex align-items-start">
                            <div class="mission-icon me-3">
                                <i class="fas fa-lightbulb text-primary fa-2x"></i>
                            </div>
                            <div class="mission-content">
                                <p class="mb-0">3. Menumbuh kembangkan kreatifitas dan dan inovasi di bidang akademik, prestasi dan keterampilan</p>
                            </div>
                        </div>
                        <div class="mission-item mb-4 d-flex align-items-start">
                            <div class="mission-icon me-3">
                                <i class="fas fa-trophy text-primary fa-2x"></i>
                            </div>
                            <div class="mission-content">
                                <p class="mb-0">4. Menumbuh kembangkan semangat berprestasi dan menumbuhkan budaya kompetitip yang jujur, sportif bagi seluruh warga sekolah dalam berlomba meraih prestasi</p>
                            </div>
                        </div>
                        <div class="mission-item mb-4 d-flex align-items-start">
                            <div class="mission-icon me-3">
                                <i class="fas fa-heart text-primary fa-2x"></i>
                            </div>
                            <div class="mission-content">
                                <p class="mb-0">5. Melaksanakan pendidikan dan pembelajaran yang ramah</p>
                            </div>
                        </div>
                        <div class="mission-item mb-4 d-flex align-items-start">
                            <div class="mission-icon me-3">
                                <i class="fas fa-leaf text-primary fa-2x"></i>
                            </div>
                            <div class="mission-content">
                                <p class="mb-0">6. Melaksanakan pendidikan dan pembelajaran yang berwawasan budaya lingkungan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.visi-section {
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.parallax-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: -1;
}

.highlight {
    color: #ffd700;
    font-weight: 600;
    transition: color 0.3s ease;
}

.highlight:hover {
    color: #fff;
}

.animate-fade-in {
    animation: fadeIn 1s ease-in;
}

.animate-slide-up {
    animation: slideUp 1s ease-out;
}

.mission-item {
    transform: translateX(0);
    transition: all 0.3s ease;
}

.mission-item:hover {
    transform: translateX(10px);
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
}

.mission-icon {
    transition: transform 0.3s ease;
}

.mission-item:hover .mission-icon {
    transform: scale(1.2);
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { transform: translateY(30px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}
</style>
@endsection