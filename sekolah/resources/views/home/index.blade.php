@extends('layouts.app')

@push('styles')
    <style>
        .kepsek-img {
            width: 300px;
            height: 450px;
            object-fit: cover;
        }

        .news {
            width: 350px;
            height: 200px;
            object-fit: cover;
        }

        .prestasi-carousel {
            overflow: hidden;
            padding: 0 50px;
        }

        .prestasi-wrapper {
            transition: transform 0.5s ease;
        }

        .prestasi-item {
            flex: 0 0 calc(33.333% - 1rem);
            max-width: calc(33.333% - 1rem);
        }

        .prestasi-prev,
        .prestasi-next {
            transition: opacity 0.3s ease;
        }

        .prestasi-prev:hover,
        .prestasi-next:hover {
            opacity: 0.8;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
@endpush

@section('content')
    <div class="hero-section">
        <div class="hero-content">
            <div class="content-wrapper">
                <div class="text-content" data-aos="fade-right" data-aos-delay="100">
                    <h1 class="school-title">SD Negeri Bandarharjo 1</h1>
                    <h2 class="city-title">Kota Semarang</h2>
                    <p class="school-motto">Unggul dalam prestasi dilandasi akhlaqul karimah, sehat, bersih, hijau dan
                        lestari</p>
                </div>
                <div class="illustration-content" data-aos="fade-left" data-aos-delay="300">
                    <div class="illustration-container">
                        <img src="{{ asset('images/illustration.png') }}" alt="School Illustration">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sambutan-section">
        <div class="container py-5">
            <div class="sambutan-wrapper">
                <div class="sambutan-image" data-aos="fade-right" data-aos-delay="100">
                    @if ($kepalaSekolah != null)
                        <x-cloudinary::image public-id="{{ $kepalaSekolah->public_id }}" width="120" height="120"
                            loading="lazy" class="kepsek-img" style="width: 120px; height: 120px; object-fit: cover;" />
                    @else
                        <img src="{{ asset('images/kepsek.png') }}" alt="Kepala Sekolah" class="kepsek-img">
                    @endif
                    <div class="kepsek-info text-center mt-3">
                        <h4 class="mb-0">SD Negeri Bandarharjo 1</h4>
                        <p class="text-muted">Kepala Sekolah</p>
                    </div>
                </div>
                <div class="sambutan-content" data-aos="fade-left" data-aos-delay="300">
                    <h3 class="sambutan-title">Sambutan Kepala Sekolah</h3>
                    <p class="sambutan-text">Assalamualaikum wr. wb.<br><br>
                        Selamat datang di website resmi SDN Bandarharjo 01<br><br>
                        Dengan penuh rasa syukur dan bangga, kami mempersembahkan website ini sebagai salah satu wadah untuk
                        memperkenalkan dan berbagi informasi mengenai sekolah kita tercinta. Melalui media digital ini, kami
                        berharap dapat menjangkau seluruh keluarga besar SDN Bandarharjo 01, mulai dari siswa, orang tua,
                        hingga alumni, serta masyarakat luas.<br><br>
                        Website ini dirancang dengan tujuan untuk memberikan kemudahan akses informasi mengenai kegiatan
                        akademik, jadwal sekolah, berita terbaru, dan berbagai aktivitas lainnya yang berlangsung di sekolah
                        ini. Selain itu, kami juga menyediakan berbagai sumber daya yang bermanfaat bagi siswa, orang tua,
                        dan tenaga pendidik dalam mendukung proses belajar mengajar.<br><br>
                        Kami percaya bahwa komunikasi yang baik antara sekolah, siswa, dan orang tua merupakan kunci
                        kesuksesan pendidikan. Oleh karena itu, kami berharap website ini dapat menjadi sarana yang efektif
                        untuk memperkuat hubungan tersebut, serta mempermudah dalam menyampaikan berbagai informasi
                        penting.<br><br>
                        Wassalamualaikum wr. wb.</p>
                </div>
            </div>
        </div>
    </div>



    <div class="program-section">
        <div class="container py-5">
            <h2 class="program-title text-center mb-5" data-aos="fade-up">Program Unggulan</h2>
            <div class="program-wrapper">
                <div class="program-list">
                    @foreach ($programs as $program)
                        <div class="program-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <a href="#" class="program-link">{{ $program['nama'] }}</a>
                        </div>
                    @endforeach
                </div>
                <div class="program-illustration" data-aos="fade-left" data-aos-delay="400">
                    <img src="{{ asset('images/students.png') }}" alt="Program Illustration">
                </div>
            </div>
        </div>
    </div>



    <div class="prestasi-section">
        <div class="container py-5">
            <h2 class="prestasi-title text-center mb-5" data-aos="fade-up">Prestasi</h2>
            <div class="prestasi-carousel position-relative">
                <div class="prestasi-wrapper d-flex transition-transform" style="gap: 1rem;">
                    @foreach ($prestasis as $prestasi)
                        <div class="prestasi-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            {{-- <x-cloudinary::image public-id="{{ $prestasi->public_id }}"
                                alt="Prestasi {{ $prestasi->nama_peserta }}" /> --}}
                            <x-cloudinary::image public-id="{{ $prestasi->public_id }}"
                                alt="Prestasi {{ $prestasi->nama_peserta }}"
                                transformation="c_fill,h_200,w_223,g_face,q_auto" loading="lazy"
                                class="prestasi img-fluid rounded mx-auto d-block"
                                style="width: 223px; height: 200px; object-fit: cover; display: block;" />
                            {{-- <img src="{{ asset($achievement['foto']) }}" alt="Prestasi {{ $achievement['nama'] }}"> --}}
                            <h4>{{ (function ($name) {
                                $words = explode(' ', ucwords(strtolower($name)));
                                if (count($words) <= 2) {
                                    return implode(' ', $words);
                                }
                            
                                $result = array_slice($words, 0, 2);
                                for ($i = 2; $i < count($words); $i++) {
                                    $result[] = substr($words[$i], 0, 1) . '.';
                                }
                            
                                return implode(' ', $result);
                            })($prestasi->nama_peserta) }}
                            </h4>
                            <p style="color: #333;">Juara {{ ucwords(strtolower($prestasi->juara)) }}
                                {{ ucwords(strtolower($prestasi->nama_lomba)) }} Tingkat
                                {{ ucwords(strtolower($prestasi->tingkat)) }} {{ $prestasi->tahun }}</p>
                        </div>
                    @endforeach
                </div>
                <button
                    class="prestasi-prev position-absolute top-50 start-0 translate-middle-y btn btn-primary rounded-circle"
                    style="z-index: 10; width: 40px; height: 40px; padding: 0;">❮</button>
                <button
                    class="prestasi-next position-absolute top-50 end-0 translate-middle-y btn btn-primary rounded-circle"
                    style="z-index: 10; width: 40px; height: 40px; padding: 0;">❯</button>
            </div>
        </div>
    </div>

    <div class="berita-section">
        <div class="container py-5">
            <h2 class="berita-title text-center mb-5" data-aos="fade-up">Berita</h2>
            <div class="berita-wrapper">
                @foreach ($news as $item)
                    <div class="berita-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="berita-image">
                            <x-cloudinary::image public-id="{{ $item->public_id }}" alt="News {{ ucwords($item->judul) }}"
                                transformation="c_fill,h_200,w_223,g_face,q_auto" loading="lazy"
                                class="news img-fluid rounded mx-auto d-block"
                                style="width: 223px; height: 200px; object-fit: cover; display: block;" />
                        </div>
                        <div class="berita-content">
                            <div class="berita-date">{{ $item->created_at->format('d M Y') }}</div>
                            <h3 class="berita-heading">{{ ucwords($item->judul) }}</h3>
                            <a href="{{ route('berita.show', $item->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                            {{-- <a href="{{ $item['link'] }}" class="btn btn-primary">Baca more</a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('berita.index') }}" class="btn btn-outline-primary btn-lg">Berita Lainnya</a>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- Prestasi Carousel Script -->
    <script src="{{ asset('js/prestasi-carousel.js') }}"></script>
@endpush
