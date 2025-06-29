@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5 mb-5">
    <div class="text-center mb-5">
        <h2 class="display-4 fw-bold text-primary mb-2">Kontak Kami</h2>
        <p class="lead text-muted">Hubungi kami untuk informasi lebih lanjut</p>
        <div class="divider mx-auto"></div>
    </div>

    <div class="row justify-content-center g-4 mb-5">
        <!-- Alamat Card -->
        <div class="col-md-4">
            <div class="contact-card card h-100 border-0 shadow-lg">
                <div class="card-body text-center p-4">
                    <div class="icon-circle mb-4">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                    </div>
                    <h5 class="card-title h4 mb-3">Alamat</h5>
                    <p class="card-text">
                        Jl. Cumi-cumi Raya No 2, Bandarharjo Kec.<br>
                        Semarang Utara, Kota Semarang<br>
                        Prov. Jawa Tengah
                    </p>
                </div>
            </div>
        </div>

        <!-- Customer Service Card -->
        <div class="col-md-4">
            <div class="contact-card card h-100 border-0 shadow-lg">
                <div class="card-body text-center p-4">
                    <div class="icon-circle mb-4">
                        <i class="fas fa-headset fa-2x"></i>
                    </div>
                    <h5 class="card-title h4 mb-3">Customer Service</h5>
                    <p class="card-text">
                        <a href="mailto:sdnbandarharjo01@gmail.com" class="text-decoration-none text-dark">sdnbandarharjo01@gmail.com</a><br>
                        <a href="tel:024-3551189" class="text-decoration-none text-dark">024-3551189</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Jam Kerja Card -->
        <div class="col-md-4">
            <div class="contact-card card h-100 border-0 shadow-lg">
                <div class="card-body text-center p-4">
                    <div class="icon-circle mb-4">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                    <h5 class="card-title h4 mb-3">Jam Kerja</h5>
                    <p class="card-text">
                        Senin - Kamis: 08.00 - 15.00 WIB<br>
                        Jumat: 08.00 - 11.30 WIB<br>
                        <span class="text-muted">Sabtu - Minggu: Libur</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Maps -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d247.51867892919036!2d110.42093895!3d-6.9616389999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwNTcnNDEuOSJTIDExMMKwMjUnMTUuNCJF!5e0!3m2!1sid!2sid!4v1703041526673!5m2!1sid!2sid" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .divider {
        width: 60px;
        height: 4px;
        background: linear-gradient(to right, #3970BE, #64B5F6);
        margin: 1rem auto;
        border-radius: 2px;
    }

    .contact-card {
        background: linear-gradient(145deg, #ffffff, #f5f5f5);
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }

    .icon-circle {
        width: 80px;
        height: 80px;
        background: linear-gradient(145deg, #3970BE, #64B5F6);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        color: white;
        transition: all 0.3s ease;
    }

    .contact-card:hover .icon-circle {
        transform: scale(1.1);
        box-shadow: 0 10px 20px rgba(57,112,190,0.2);
    }

    .card-title {
        color: #2c3e50;
        font-weight: 600;
    }

    .card-text {
        color: #666;
        line-height: 1.8;
    }

    @media (max-width: 768px) {
        .display-4 {
            font-size: 2rem;
        }
        .lead {
            font-size: 1rem;
        }
    }
</style>
@endpush