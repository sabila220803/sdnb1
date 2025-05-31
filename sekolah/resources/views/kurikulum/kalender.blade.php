@extends('layouts.app')

@section('content')
    <div class="container py-5 mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg overflow-hidden animate-card">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <i class="fas fa-calendar-alt fa-2x me-3" style="color: #3970BE;"></i>
                            <h2 class="text-center m-0" style="color: #3970BE;">KALDIK KOTA SEMARANG</h2>
                        </div>

                        <div class="list-group">
                            @forelse ($kalenders->where('jenis', 'Kaldik Kota Semarang') as $kalender)
                                <div
                                    class="list-group-item d-flex justify-content-between align-items-center p-4 calendar-item">
                                    <div class="d-flex align-items-center">
                                        <div class="calendar-icon me-3">
                                            <i class="far fa-calendar-check"></i>
                                            <span class="year-badge">{{ $kalender->tahun_ajaran }}</span>
                                        </div>
                                        <span class="fw-bold">{{ ucwords($kalender->nama) }}</span>
                                    </div>
                                    <a href="{{ route('kurikulum.download', $kalender->id) }}"
                                        class="btn btn-primary px-4 btn-hover-effect">Lihat Detail</a>
                                </div>
                            @empty
                                <div class="text-center p-4">
                                    <p class="text-light-muted h4 fw-bold opacity-50">Tidak ada kalender pendidikan yang tersedia.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg overflow-hidden animate-card">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <i class="fas fa-school fa-2x me-3" style="color: #3970BE;"></i>
                            <h2 class="text-center m-0" style="color: #3970BE;">KALDIK SDN BANDARHARJO 01</h2>
                        </div>

                        <div class="list-group">
                            @forelse ($kalenders->where('jenis', 'Kaldik SDN Bandarharjo 01') as $kalender)
                                <div
                                    class="list-group-item d-flex justify-content-between align-items-center p-4 calendar-item">
                                    <div class="d-flex align-items-center">
                                        <div class="calendar-icon me-3">
                                            <i class="far fa-calendar-check"></i>
                                            <span class="year-badge">{{ $kalender->tahun_ajaran }}</span>
                                        </div>
                                        <span class="fw-bold">{{ ucwords($kalender->nama) }}</span>
                                    </div>
                                    <a href="{{ route('kurikulum.download', $kalender->id) }}"
                                        class="btn btn-primary px-4 btn-hover-effect">Lihat Detail</a>
                                </div>
                            @empty
                                <div class="text-center p-4">
                                    <p class="text-light-muted h4 fw-bold opacity-50">Tidak ada kalender pendidikan yang tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .animate-card {
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .calendar-item {
            transition: all 0.3s ease;
            border: none;
            margin-bottom: 1rem;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .calendar-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(57, 112, 190, 0.2);
        }

        .calendar-icon {
            position: relative;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            border-radius: 50%;
            color: #3970BE;
        }

        .year-badge {
            position: absolute;
            bottom: -5px;
            right: -5px;
            background: #3970BE;
            color: white;
            font-size: 0.7rem;
            padding: 2px 4px;
            border-radius: 4px;
        }

        .btn-hover-effect {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-hover-effect:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s;
        }

        .btn-hover-effect:hover:before {
            left: 100%;
        }

        .btn-primary {
            background-color: #3970BE;
            border-color: #3970BE;
            border-radius: 25px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #2c5a9e;
            border-color: #2c5a9e;
            transform: translateY(-2px);
        }
    </style>
@endsection
