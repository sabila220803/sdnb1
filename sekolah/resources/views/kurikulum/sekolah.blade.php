@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <img src="{{ asset('images/kurikulum.png') }}" 
                 alt="Logo Kurikulum" 
                 class="img-fluid mb-4" 
                 style="max-width: 300px;">
            
            <h2 class="mb-4" style="color: #3970BE; font-weight: bold;">
                KURIKULUM SDN BANDARHARJO 01 SEMARANG
            </h2>

            <p class="text-muted mb-4">
                Saat ini kami telah melaksanakan Kurikulum 2013 sejak Tahun Pelajaran 2017/2018.
            </p>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="text-primary mb-3">Prinsip Kurikulum</h5>
                    <p class="mb-4">
                        Kurikulum SDN Bandarharjo 01 Semarang mengacu kepada Standar Nasional Pendidikan untuk mencapai tujuan pendidikan nasional.
                    </p>
                    
                    <h6 class="mb-3">Standar Nasional Pendidikan terdiri dari:</h6>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-check text-primary me-3"></i><span>Standar Isi</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-check text-primary me-3"></i><span>Standar Proses</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-check text-primary me-3"></i><span>Kompetensi Lulusan</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-check text-primary me-3"></i><span>Tenaga Pendidikan</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-check text-primary me-3"></i><span>Sarana Prasarana</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-check text-primary me-3"></i><span>Pengelolaan</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-check text-primary me-3"></i><span>Pembiayaan</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-check text-primary me-3"></i><span>Penilaian Pendidikan</span></li>
                    </ul>

                    <h6 class="mb-3">Pengembangan kurikulum memberi kesempatan peserta didik untuk:</h6>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-star text-warning me-3"></i><span>Menanamkan sikap religius melalui pembelajaran agama untuk keimanan dan ketakwaan terhadap Tuhan Yang Maha Esa</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-star text-warning me-3"></i><span>Menanamkan kebiasaan peserta didik untuk beribadah sesuai dengan agamanya</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-star text-warning me-3"></i><span>Membantu peserta didik untuk mengenali potensi dirinya sehingga dapat berkembang optimal</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-star text-warning me-3"></i><span>Menumbuhkan semangat berprestasi, aktif, kreatif, kepada seluruh warga sekolah</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-star text-warning me-3"></i><span>Meningkatkan kemampuan peserta didik dalam menciptakan lingkungan yang bersih, sehat, di lingkungan sekitar</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-star text-warning me-3"></i><span>Menanamkan sikap nasionalisme dan cinta tanah air melalui nilai-nilai luhur yang berakar dari Pancasila</span></li>
                    </ul>

                    <h6 class="mb-3">Pihak yang terlibat dalam penyusunan kurikulum:</h6>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-users text-info me-3"></i><span>Dinas Pendidikan</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-users text-info me-3"></i><span>Guru</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-users text-info me-3"></i><span>Kepala Sekolah</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-users text-info me-3"></i><span>Pengawas Sekolah</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-users text-info me-3"></i><span>Komite Sekolah</span></li>
                        <li class="list-group-item d-flex align-items-center py-3"><i class="fas fa-users text-info me-3"></i><span>Paguyuban Orang tua/Wali Siswa</span></li>
                    </ul>

                    <div class="row justify-content-center mb-5">
                        <div class="col-12">
                            <h6 class="text-center mb-4">Proses pembelajaran dilengkapi dengan:</h6>
                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-book text-success mb-2 fa-2x"></i>
                                    <p class="mb-0">Kurikulum 2013</p>
                                </div>
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-file-alt text-success mb-2 fa-2x"></i>
                                    <p class="mb-0">Silabus</p>
                                </div>
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-clipboard text-success mb-2 fa-2x"></i>
                                    <p class="mb-0">RPP</p>
                                </div>
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-users text-success mb-2 fa-2x"></i>
                                    <p class="mb-0">Buku Guru dan Siswa</p>
                                </div>
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-books text-success mb-2 fa-2x"></i>
                                    <p class="mb-0">Buku Referensi lain</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-5">
                        <div class="col-12">
                            <h6 class="text-center mb-4">Sistem Pembelajaran:</h6>
                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-laptop text-primary mb-2 fa-2x"></i>
                                    <p class="mb-0">Daring dan luring</p>
                                </div>
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-tasks text-primary mb-2 fa-2x"></i>
                                    <p class="mb-0">Penugasan</p>
                                </div>
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-project-diagram text-primary mb-2 fa-2x"></i>
                                    <p class="mb-0">Sistem Proyek</p>
                                </div>
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-folder text-primary mb-2 fa-2x"></i>
                                    <p class="mb-0">Portofolio</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-5">
                        <div class="col-12">
                            <h6 class="text-center mb-4">Penguatan Pendidikan Karakter (PPK):</h6>
                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-heart text-danger mb-2 fa-2x"></i>
                                    <p class="mb-0">PPK berbasis kelas</p>
                                </div>
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-heart text-danger mb-2 fa-2x"></i>
                                    <p class="mb-0">PPK berbasis budaya sekolah</p>
                                </div>
                                <div class="bg-light rounded p-3 text-center" style="min-width: 200px;">
                                    <i class="fas fa-heart text-danger mb-2 fa-2x"></i>
                                    <p class="mb-0">PPK berbasis masyarakat</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="text-center mb-4">Penilaian:</h6>
                    <div class="row justify-content-center align-items-start g-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="text-center text-primary mb-3">Jenis ujian yang dilaksanakan di sekolah:</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-file-alt text-info me-3"></i>Ujian harian (praktek/teori)</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-file-alt text-info me-3"></i>Ujian tengah semester (teori)</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-file-alt text-info me-3"></i>Ujian akhir semester (teori)</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-file-alt text-info me-3"></i>Ujian tes kemampuan dasar (TKD)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="text-center text-primary mb-3">Penilaian hasil belajar memperhatikan:</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-clipboard-check text-success me-3"></i>Penilaian hasil belajar dari Kemdikbud dengan penyesuaian masa darurat</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-clipboard-check text-success me-3"></i>Mencakup aspek sikap, pengetahuan, keterampilan</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-clipboard-check text-success me-3"></i>Portofolio, penugasan, proyek, praktek, tulis</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-clipboard-check text-success me-3"></i>Hasil belajar berupa foto, gambar, video, animasi, karya seni dan bentuk lainnya</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="text-center mb-4 mt-5">Kriteria Kenaikan dan Kelulusan:</h6>
                    <div class="row justify-content-center align-items-start g-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="text-center text-primary mb-3">Kriteria kenaikan kelas:</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-arrow-up text-primary me-3"></i>Penilaian akhir tahun dapat berupa portofolio nilai rapor dan prestasi</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-arrow-up text-primary me-3"></i>Menyelesaikan seluruh program pembelajaran pada dua semester</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-arrow-up text-primary me-3"></i>Nilai sikap spiritual dan sosial minimal Baik</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-arrow-up text-primary me-3"></i>Nilai di bawah KKM tidak lebih dari tiga mata pelajaran</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-arrow-up text-primary me-3"></i>Ketidakhadiran tanpa keterangan maksimal 15% dari hari efektif</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="text-center text-primary mb-3">Kriteria kelulusan:</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-graduation-cap text-success me-3"></i>Menyelesaikan seluruh program pembelajaran</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-graduation-cap text-success me-3"></i>Nilai minimal baik untuk seluruh kelompok mata pelajaran</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-graduation-cap text-success me-3"></i>Nilai sikap spiritual dan sosial minimal Baik</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-graduation-cap text-success me-3"></i>Kelulusan berdasarkan nilai lima semester terakhir</li>
                                        <li class="list-group-item d-flex align-items-center"><i class="fas fa-graduation-cap text-success me-3"></i>Nilai semester genap kelas 6 sebagai tambahan nilai kelulusan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="lead mb-4">
                        Kurikulum SDN Bandarharjo 01 Semarang dirancang untuk memberikan pendidikan berkualitas 
                        yang sesuai dengan perkembangan zaman dan kebutuhan siswa.
                    </p>

                    <div class="text-start">
                        <h5 class="text-primary mb-3">Program Unggulan Kurikulum:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Pembelajaran Berbasis Teknologi
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Pengembangan Karakter dan Budi Pekerti
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Program Literasi dan Numerasi
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Pembelajaran Aktif, Kreatif, dan Menyenangkan
                            </li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <h5 class="text-primary mb-3">Struktur Kurikulum:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Mata Pelajaran</th>
                                        <th>Alokasi Waktu/Minggu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pendidikan Agama dan Budi Pekerti</td>
                                        <td class="text-center">4 JP</td>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan Pancasila</td>
                                        <td class="text-center">4 JP</td>
                                    </tr>
                                    <tr>
                                        <td>Bahasa Indonesia</td>
                                        <td class="text-center">6 JP</td>
                                    </tr>
                                    <tr>
                                        <td>Matematika</td>
                                        <td class="text-center">6 JP</td>
                                    </tr>
                                    <tr>
                                        <td>Ilmu Pengetahuan Alam</td>
                                        <td class="text-center">4 JP</td>
                                    </tr>
                                    <tr>
                                        <td>Ilmu Pengetahuan Sosial</td>
                                        <td class="text-center">4 JP</td>
                                    </tr>
                                </tbody>
                            </table>
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
    .card {
        border-radius: 15px;
        border: none;
        margin-bottom: 2rem;
    }
    
    .card-body {
        padding: 2rem;
    }

    .list-group-item {
        border-left: none;
        border-right: none;
        padding: 1.25rem;
        transition: background-color 0.2s;
    }

    .list-group-item:hover {
        background-color: rgba(57, 112, 190, 0.05);
    }
    
    .table th {
        background-color: #3970BE;
        color: white;
        padding: 1rem;
    }
    
    .table td {
        padding: 1rem;
        vertical-align: middle;
    }
    
    .table-bordered {
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    h5.text-primary, h6 {
        margin-top: 1.5rem;
        margin-bottom: 1.25rem;
        font-weight: 600;
    }

    .mb-4 {
        margin-bottom: 2rem !important;
    }

    .mt-4 {
        margin-top: 2rem !important;
    }

    .container {
        padding-bottom: 3rem;
    }
</style>
@endpush