@extends('layouts.app')

@section('content')


<!-- Hero Section dengan Parallax -->
<div class="parallax-section" style="background-image: url('{{ asset('images/sekolah-2010.jpg') }}');">
    <div class="parallax-overlay"></div>
    <div class="container position-relative text-center text-white">
        <div class="fade-in">
            <h1 class="display-4 fw-bold mb-4">SEJARAH SINGKAT SDN BANDARHARJO 01</h1>
            <p class="lead">Mendidik Generasi Unggul Sejak 1973</p>
        </div>
    </div>
</div>

    <!-- Content Section -->
    <div class="container py-5">
        <!-- Sejarah dan Lokasi -->
        <div class="row justify-content-center mb-5 fade-in">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Tentang SDN Bandarharjo 01</h2>
                        <p class="lead text-center mb-4">Secara administrasi Sekolah Dasar (SD) Negeri Bandarharjo 01 beralamat di Jalan Cumi-cumi Raya No. 2, Kelurahan Bandarharjo, Kecamatan Semarang Utara, Kota Semarang, Provinsi Jawa Tengah.</p>
                        <p class="text-center">Berdiri sejak tahun 1973, SDN Bandarharjo 01 telah menjadi salah satu sekolah dasar unggulan di Semarang dengan berbagai prestasi baik di bidang akademik maupun non-akademik.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline Kepala Sekolah -->
        <div class="row justify-content-center mb-5 fade-in">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4">Perjalanan Kepemimpinan</h3>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h5>Bu Suwarti</h5>
                                <p>Kepala Sekolah Pertama SDN Bandarharjo 01</p>
                            </div>
                            <div class="timeline-item">
                                <h5>Bapak Soeyoto</h5>
                                <p>Melanjutkan Estafet Kepemimpinan</p>
                            </div>
                            <div class="timeline-item">
                                <h5>Bu Veronica Utami</h5>
                                <p>Memimpin dengan Dedikasi Tinggi</p>
                            </div>
                            <div class="timeline-item">
                                <h5>Bu Sri Lestari</h5>
                                <p>Mengembangkan Kualitas Pendidikan</p>
                            </div>
                            <div class="timeline-item">
                                <h5>Bu Rustiah</h5>
                                <p>Meningkatkan Standar Akademik</p>
                            </div>
                            <div class="timeline-item">
                                <h5>Bapak Sarpio</h5>
                                <p>Memajukan Infrastruktur Sekolah</p>
                            </div>
                            <div class="timeline-item">
                                <h5>Bu Diah Ekawati</h5>
                                <p>Fokus pada Pengembangan Karakter</p>
                            </div>
                            <div class="timeline-item">
                                <h5>Bu Sri Widiyati</h5>
                                <p>Memperkuat Prestasi Akademik</p>
                            </div>
                            <div class="timeline-item">
                                <h5>Bu Bugiyanti</h5>
                                <p>Kepala Sekolah Saat Ini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fasilitas Sekolah -->
        <div class="row justify-content-center mb-5 fade-in">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4">Fasilitas Sekolah</h3>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="facility-card card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-chalkboard fa-3x text-primary mb-3"></i>
                                        <h5>Ruang Pembelajaran</h5>
                                        <ul class="list-unstyled">
                                            <li>6 Ruang Kelas</li>
                                            <li>Ruang Perpustakaan & Komputer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="facility-card card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-user-tie fa-3x text-primary mb-3"></i>
                                        <h5>Ruang Administrasi</h5>
                                        <ul class="list-unstyled">
                                            <li>Ruang Kepala Sekolah</li>
                                            <li>Ruang Guru</li>
                                            <li>Ruang Tata Usaha</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="facility-card card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-hands-helping fa-3x text-primary mb-3"></i>
                                        <h5>Fasilitas Pendukung</h5>
                                        <ul class="list-unstyled">
                                            <li>Ruang UKS</li>
                                            <li>Ruang Ibadah</li>
                                            <li>Kantin Sekolah</li>
                                            <li>Toilet</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi dan Komitmen -->
        <div class="row justify-content-center fade-in">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-4">Visi dan Komitmen</h3>
                        <p class="lead">SDN Bandarharjo 01 berkomitmen untuk memberikan pendidikan berkualitas dan membentuk karakter siswa yang berakhlak mulia. Kami fokus pada peningkatan SDM yang berkualitas dan bermartabat berdasarkan ketaqwaan dan cinta tanah air & bangsa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Gambar Sekolah 2021 -->
         <div class="parallax-section mt-5" style="background-image: url('{{ asset('images/sekolah-2010.jpg') }}'); min-height: 300px;">
             <div class="parallax-overlay"></div>
             <div class="container position-relative text-center text-white fade-in">
                 <h2 class="mb-3">SDN BANDARHARJO 01 TAHUN 2021</h2>
                 <p class="lead">Terus Berkembang dan Berinovasi</p>
             </div>
         </div>
    </div>
</div>
@endsection