@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <h2 class="text-center mb-5">KONTAK KAMI</h2>

    <div class="row justify-content-center mb-5">
        <!-- Alamat Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm" style="background-color: #FFEBD4 !important;">
                <div class="card-body text-center" style="background-color: #FFEBD4 !important;">
                    <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">ALAMAT</h5>
                    <p class="card-text">
                        Jl. Cumi-cumi Raya No 2, Bandarharjo Kec.<br>
                        Semarang Utara, Kota Semarang<br>
                        Prov. Jawa Tengah
                    </p>
                </div>
            </div>
        </div>

        <!-- Customer Service Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm" style="background-color: #FFEBD4 !important;">
                <div class="card-body text-center" style="background-color: #FFEBD4 !important;">
                    <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">CUSTOMER SERVICE</h5>
                    <p class="card-text">
                        E-mail: sdnbandarharjo01@gmail.com<br>
                        Telp : 024-3551189
                    </p>
                </div>
            </div>
        </div>

        <!-- Jam Kerja Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm" style="background-color: #FFEBD4 !important;">
                <div class="card-body text-center" style="background-color: #FFEBD4 !important;">
                    <i class="fas fa-clock fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">JAM KERJA</h5>
                    <p class="card-text">
                        Senin - Kamis: Pukul 08.00 - 15.00 WIB<br>
                        Jumat : Pukul 08.00 - 11.30 WIB<br>
                        Sabtu - Minggu : Libur
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Maps -->
    <div class="row justify-content-center mb-5">
        <div class="col-12">
            <div class="card shadow-sm" style="background-color: #FFEBD4 !important;">
                <div class="card-body p-0" style="background-color: #FFEBD4 !important;">
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
    .card, .card-body {
        border-radius: 15px;
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .fas {
        color: #3970BE;
    }
    .card-title {
        color: #3970BE;
        font-weight: bold;
        margin-bottom: 1rem;
    }
    .card-text {
        color: #666;
        line-height: 1.6;
    }
</style>
@endpush