@extends('layouts.app')

@section('content')
    <div class="container-fluid px-3 px-sm-4 px-md-5 py-4 py-md-5" style="padding-top: 100px !important;">
        <!-- Title Section -->
        <div class="ekstrakurikuler-header text-center mb-4 mb-md-5">
            <div class="btn btn-primary btn-lg px-3 px-sm-4 px-md-5 py-2 py-md-3 rounded-pill shadow-lg">
                <h1 class="m-0 fs-3 fs-md-2 fs-lg-1">PRESTASI SDN BANDARHARJO 01</h1>
            </div>
        </div>
        {{-- <div class="container mt-4 mb-4">
        <div class="title-section py-3 rounded shadow" style="transform: translateY(5px); background-color: #3970BE;">
            <h1 class="text-center text-white mb-0" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2)2);">PRESTASI SDN BANDARHARJO 01</h1>
        </div>
    </div> --}}

        <!-- Logo Section -->
        <div class="container mb-4 mb-md-5">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="text-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Bandarharjo 01" class="img-fluid"
                            style="max-width: min(100%, 500px);">
                    </div>
                </div>
            </div>
        </div>

        <!-- Prestasi List Section -->
        <div class="container py-3 py-md-4">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <!-- Filter Buttons -->
                    {{-- <div class="text-center mb-4">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary filter-btn active" data-year="all">Semua</button>
                        <button type="button" class="btn btn-outline-primary filter-btn" data-year="2021">2021</button>
                        <button type="button" class="btn btn-outline-primary filter-btn" data-year="2019">2019</button>
                        <button type="button" class="btn btn-outline-primary filter-btn" data-year="2018">2018</button>
                    </div>
                </div> --}}

                    <div class="prestasi-container">
                        @foreach ($prestasis->groupBy('tahun') as $tahun => $prestasiTahun)
                            <div class="prestasi-year" data-year="{{ $tahun }}">
                                <div class="card border-0 shadow-sm hover-card mb-4">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-trophy text-warning me-3" style="font-size: 2rem;"></i>
                                            <h3 class="card-title m-0">Prestasi {{ $tahun }}</h3>
                                        </div>
                                        <div class="prestasi-list">
                                            @foreach ($prestasiTahun as $prestasi)
                                                <div class="achievement-item">
                                                    <div class="medal bronze"></div>
                                                    <p>{{ $prestasi->nama_peserta }} juara {{ $prestasi->juara }}
                                                        {{ $prestasi->nama_lomba }} Tk. {{ $prestasi->tingkat }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@push('styles')
    <style>
        @media (max-width: 576px) {
            .achievement-item {
                padding: 0.75rem !important;
            }

            .achievement-item p {
                font-size: 0.9rem;
            }

            .medal {
                width: 25px;
                height: 25px;
            }

            .medal::after {
                width: 15px;
                height: 15px;
            }

            .card-body {
                padding: 1rem !important;
            }

            .card-title {
                font-size: 1.25rem;
            }

            .fa-trophy {
                font-size: 1.5rem !important;
            }
        }

        .hover-card {
            transition: transform 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
        }

        .achievement-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }

        .achievement-item:hover {
            background-color: #e9ecef;
            transform: scale(1.02);
        }

        .achievement-item p {
            margin: 0;
            margin-left: 1rem;
        }

        .medal {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            position: relative;
            flex-shrink: 0;
        }

        .medal::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        .medal.gold {
            background: linear-gradient(45deg, #FFD700, #FFA500);
            box-shadow: 0 2px 5px rgba(255, 215, 0, 0.3);
        }

        .medal.silver {
            background: linear-gradient(45deg, #C0C0C0, #A9A9A9);
            box-shadow: 0 2px 5px rgba(192, 192, 192, 0.3);
        }

        .medal.bronze {
            background: linear-gradient(45deg, #CD7F32, #8B4513);
            box-shadow: 0 2px 5px rgba(205, 127, 50, 0.3);
        }

        .filter-btn {
            transition: all 0.3s ease;
            border-radius: 20px;
            margin: 0 5px;
        }

        .filter-btn.active {
            background-color: #0d6efd;
            color: white;
        }

        .prestasi-year {
            opacity: 1;
            transition: all 0.5s ease;
        }

        .prestasi-year.hidden {
            display: none;
            opacity: 0;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const prestasiYears = document.querySelectorAll('.prestasi-year');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    button.classList.add('active');

                    const year = button.getAttribute('data-year');

                    prestasiYears.forEach(prestasi => {
                        if (year === 'all' || prestasi.getAttribute('data-year') === year) {
                            prestasi.classList.remove('hidden');
                            setTimeout(() => prestasi.style.opacity = 1, 50);
                        } else {
                            prestasi.style.opacity = 0;
                            setTimeout(() => prestasi.classList.add('hidden'), 500);
                        }
                    });
                });
            });
        });
    </script>
@endpush
