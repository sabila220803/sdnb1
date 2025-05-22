@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="ekstrakurikuler-header text-center mb-5">
        <div class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-lg">
            <h1 class="m-0">EKSTRAKURIKULER</h1>
        </div>
    </div>

    <div class="row g-4">
        <!-- Pramuka -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/ekstrakurikuler/pramuka.png') }}" alt="Pramuka" class="me-3" style="width: 80px; height: 80px; object-fit: contain;">
                        <h3 class="card-title m-0">1. PRAMUKA</h3>
                    </div>
                    <p class="card-text">Kegiatan kepramukaan yang mengembangkan karakter, kedisiplinan, dan keterampilan hidup siswa melalui berbagai aktivitas outdoor dan indoor.</p>
                </div>
            </div>
        </div>

        <!-- BTQ -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/ekstrakurikuler/btq.png') }}" alt="BTQ" class="me-3" style="width: 80px; height: 80px; object-fit: contain;">
                        <h3 class="card-title m-0">2. BTQ</h3>
                    </div>
                    <p class="card-text">Program Baca Tulis Al-Qur'an yang membantu siswa dalam mempelajari dan memahami Al-Qur'an dengan metode yang menyenangkan.</p>
                </div>
            </div>
        </div>

        <!-- Komputer -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/ekstrakurikuler/komputer.png') }}" alt="Komputer" class="me-3" style="width: 80px; height: 80px; object-fit: contain;">
                        <h3 class="card-title m-0">3. KOMPUTER</h3>
                    </div>
                    <p class="card-text">Pembelajaran teknologi informasi dan komputer yang membekali siswa dengan keterampilan digital untuk menghadapi era modern.</p>
                </div>
            </div>
        </div>

        <!-- Tari -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/ekstrakurikuler/tari.png') }}" alt="Tari" class="me-3" style="width: 80px; height: 80px; object-fit: contain;">
                        <h3 class="card-title m-0">4. TARI</h3>
                    </div>
                    <p class="card-text">Kegiatan seni tari yang mengajarkan siswa tentang keindahan gerak, budaya, dan ekspresi diri melalui tarian tradisional dan modern.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.ekstrakurikuler-header .btn-primary {
    background-color: #3970BE;
    border: none;
    transition: transform 0.3s ease;
}

.ekstrakurikuler-header .btn-primary:hover {
    transform: translateY(-5px);
}

.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.card-title {
    color: #3970BE;
    font-weight: 600;
}

@media (max-width: 768px) {
    .container.py-5 {
        padding-top: 6rem !important;
    }
    
    .ekstrakurikuler-header .btn-primary {
        padding: 0.75rem 2rem !important;
    }
    
    .ekstrakurikuler-header h1 {
        font-size: 1.5rem;
    }
}
</style>
@endsection