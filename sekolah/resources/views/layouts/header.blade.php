<header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/logo-sekolah.png') }}" 
                     alt="Logo Sekolah" 
                     width="60" 
                     height="60">
                <div class="ms-3">
                    <span class="d-block">SDN BANDARHARJO 1</span>
                    <small>Semareng</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="d-flex w-100 align-items-center flex-column flex-lg-row">
                    <!-- Menu Tengah -->
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="/">BERANDA</a>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                PROFIL
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                                <li><a class="dropdown-item" href="/profil/sejarah">Sejarah Sekolah</a></li>
                                <li><a class="dropdown-item" href="/profil/visi-misi">Visi dan Misi</a></li>
                                <li><a class="dropdown-item" href="/profil/guru-staff">Guru dan Staff</a></li>
                                <li><a class="dropdown-item" href="/profil/ekstrakurikuler">Ekstrakurikuler</a></li>
                                <li><a class="dropdown-item" href="/profil/prestasi">Prestasi Sekolah</a></li>
                                <li><a class="dropdown-item" href="/profil/kelas">Profil Kelas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="kurikulumDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                KURIKULUM
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="kurikulumDropdown">
                                <li><a class="dropdown-item" href="/kurrikulum/sekolah">Kurikulum Sekolah</a></li>
                                <li><a class="dropdown-item" href="/kurrikulum/kalender">Kalender Pendidikan</a></li>
                                <li><a class="dropdown-item" href="https://www.youtube.com/@sdnbandarharjo0154/featured" target="_blank">Video Pembelajaran Youtube</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="/berita">BERITA</a>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="lombaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                LOMBA
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="lombaDropdown">
                                <li><a class="dropdown-item" href="/lomba/tulisan-motivasi">LOMBA MEMBUAT TULISAN MOTIVASI ATAU INSPIRATIF</a></li>
                                <li><a class="dropdown-item" href="/lomba/bahasa-jawa">LOMBA BAHASA JAWA 2021</a></li>
                                <li><a class="dropdown-item" href="/lomba/pai-seni-islami">LOMBA MATA PELAJARAN PAI DAN SENI ISLAMI</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="galeriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                GALERI
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="galeriDropdown">
                                <li><a class="dropdown-item" href="/galeri/foto">Foto</a></li>
                                <li><a class="dropdown-item" href="https://www.youtube.com/channel/UC4s4UjNNJ5eO6MJrtgck2wQ" target="_blank">Video</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="/website-terkait">WEBSITE TERKAIT</a>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="hubungiKamiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                HUBUNGI KAMI
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="hubungiKamiDropdown">
                                <li><a class="dropdown-item" href="/hubungi-kami/kontak">Kontak</a></li>
                                <li><a class="dropdown-item" href="/hubungi-kami/kritik-saran">Kritik dan Saran</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <!-- Tombol Kanan -->
                    <div class="d-flex justify-content-center mb-3 mb-lg-0 ms-lg-3">
                        <a href="/gabung" class="btn px-4" style="font-weight: 600; background-color: #4C902D; color: white;">GABUNG</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>