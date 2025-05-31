<?php

namespace App\Http\Controllers;

use App\Models\BeritaUtama;
use Illuminate\Http\Request;

class BeritaDetailController extends Controller
{
    protected $berita;

    public function __construct()
    {
        $this->berita = new BeritaUtama();
    }

    public function show($id)
    {
        // Mendapatkan semua berita
        $allNews = $this->berita->getLatestNews();
        
        // Mencari berita berdasarkan ID (index array)
        $id = (int) $id;
        if ($id >= 0 && $id < count($allNews)) {
            $berita = $allNews[$id];
            
            // Menambahkan konten lengkap berita
            $berita['konten'] = $this->getBeritaContent($id);
            
            return view('berita.detail', compact('berita'));
        }
        
        // Jika berita tidak ditemukan, redirect ke halaman berita
        return redirect()->route('berita.index');
    }
    
    private function getBeritaContent($id)
    {
        // Konten berita berdasarkan ID
        $contents = [
            0 => '<p>Tujuh kunci sukses sekolah berkemajuan. Hal itu disampaikan Sri Sayekti dalam menerima studi tiru Dabin Kusumbudhi Karangdowo Kecamatan Karangdowo Klaten Jawa Tengah dengan moderator Wakasek bidang Humas Dwi Jatmiko, Senin (19/5/2023).</p>
                <p>Dalam kegiatan yang dilaksanakan secara tatap muka di aula sekolah sehat. Kepala SD Muhammadiyah 1 Ketelan Surakarta Jawa Tengah ini menyampaikan sekolah tidak akan menjadi unggul apabila guru atau staf yang memiliki fixed mindset dalam bekerja.</p>
                <p>"Sekolah yang di tidak siswa atau customer. Building Image yang kurang menarik. Maka, ada tujuh kunci sukses sekolah berkemajuan," ujarnya.</p>
                <p>Sayekti mengungkapkan perlu adanya bagaimana memanajemen Sumber Daya Manusia. Manajemen Loyalitas. Manajemen Pelayanan. Manajemen Kurikulum. Manajemen Pengembangan Inovasi dan Teknologi Pesatue. Manajemen Marketing dan Promotion. Manajemen Doa.</p>
                <p>"Recharging mindset karakter dan kualitas sumberdaya manusia terutama guru dan karyawan. Kesuksesan adalah 95% mindset, 5% strategi. Kesuluhannya banyak orang menjadikan 5% mindset, 95% strategi. Proyeksi sekolah berkemajuan bisa diawali dengan mimpi sekolah sukses, PPDB 100%, sekolah budget, dan sekolah sesuai dengan kondisi masing-masing," jelasnya.</p>
                <p>Dia menjelaskan ubah perilaku agar laku. "Jangan-jangan sok laku, karena jeleknya perilaku. Terlalu kaku, terlalu aku. Semua yang kita kerjakan akan diminta pertanggungjawaban. Di setiap kesulitan ada kemudahan. Allah tidak akan membebani manusia melebihi kemampuannya," jelasnya, sambil tersenyum.</p>
                <p>Oleh karena itu, sambungnya, kita harus manajemen loyalitas. Tidak akan pernah menyogok dengan orang yang pernah membantunya. Tidak akan melupungi kapiling sendiri.</p>
                <p>"Tidak akan meludahi piring tempat ia makan, sumur tempat dia minum. Loyalitas tanpa batas. Loyalitas sama dengan nyawa yang artinya kesetiheraan," sambung anggota tim Dikdasmen Majelis Dikdasmen PP Muhammadiyah.</p>
                <p>Sementara itu, Ketua Dabin Aulia GS menyampaikan. "Kami, segenap rombongan dengan jumlah anggota 45 yang terdiri dari 1 Koordinator wilayah, 11 Kepala Sekolah, 11 Guru Fase A, 11 Guru Fase B, dan 11 Guru Fase C, mengucapkan terima kasih atas sambuttannya. Dan semangat untuk mempraktikkan pada prinsip Amati, Tiru, Modifikasi (ATM) dari pada hasil studi tiru," ucap Aulia, penuh semangat.</p>',
            1 => '<p>Prestasi gemilang kembali diraih oleh siswa-siswi SD Muhammadiyah 1 Ketelan Surakarta dalam Olimpiade Sains Nasional (OSN) tingkat provinsi yang diselenggarakan pada tanggal 5-7 Mei 2025. Tim sekolah berhasil membawa pulang 3 medali emas, 2 medali perak, dan 4 medali perunggu dari berbagai bidang kompetisi.</p>
                <p>Kepala Sekolah, Ibu Sri Sayekti, M.Pd., menyampaikan rasa bangganya atas pencapaian luar biasa ini. "Prestasi ini merupakan bukti nyata dari kerja keras dan dedikasi para siswa serta bimbingan intensif dari para guru pembimbing. Kami selalu menekankan pentingnya berpikir kritis dan kreativitas dalam pembelajaran sains," ujarnya saat menyambut kepulangan tim OSN di sekolah.</p>
                <p>Medali emas diraih oleh Alam Nia K. (Matematika), Nadira Nova O. (IPA), dan Ega Putra P. (Komputer). Sementara medali perak diperoleh oleh Dimas Arya S. (Matematika) dan Zahra Putri A. (IPA). Medali perunggu disumbangkan oleh empat siswa lainnya dari berbagai bidang kompetisi.</p>
                <p>Para juara mengungkapkan bahwa kunci kesuksesan mereka adalah persiapan yang matang dan dukungan penuh dari sekolah. "Kami berlatih hampir setiap hari setelah jam sekolah dengan bimbingan guru-guru yang sangat berdedikasi," ungkap Alam Nia K., peraih medali emas bidang Matematika.</p>
                <p>Prestasi ini menambah deretan pencapaian SD Muhammadiyah 1 Ketelan Surakarta yang konsisten menorehkan prestasi di bidang akademik maupun non-akademik. Sekolah ini dikenal dengan program unggulannya yang mengedepankan keseimbangan antara kecerdasan intelektual, emosional, dan spiritual.</p>
                <p>"Kami berharap prestasi ini dapat memotivasi seluruh siswa untuk terus berprestasi dan mengembangkan potensi mereka secara maksimal," tambah Ibu Sri Sayekti.</p>
                <p>Para siswa berprestasi ini akan melanjutkan perjuangan mereka di tingkat nasional yang akan diselenggarakan pada bulan Juli mendatang di Jakarta. Sekolah telah menyiapkan program pembinaan intensif untuk mempersiapkan para siswa menghadapi kompetisi di level yang lebih tinggi.</p>',
            2 => '<p>SD Muhammadiyah 1 Ketelan Surakarta menggelar perayaan Hari Kartini yang meriah pada tanggal 21 April 2025. Acara yang mengusung tema "Kartini Modern: Inspirasi untuk Generasi Penerus" ini diikuti oleh seluruh siswa, guru, dan staf sekolah.</p>
                <p>Perayaan dimulai dengan upacara bendera khusus yang dipimpin oleh Kepala Sekolah, Ibu Sri Sayekti, M.Pd. Dalam sambutannya, beliau menekankan pentingnya meneladani semangat juang R.A. Kartini dalam konteks pendidikan modern. "R.A. Kartini berjuang untuk pendidikan perempuan di zamannya. Kini, kita semua memiliki kesempatan yang sama untuk mendapatkan pendidikan berkualitas. Mari kita manfaatkan dengan sebaik-baiknya," ujarnya.</p>
                <p>Rangkaian acara dilanjutkan dengan berbagai lomba yang menarik, seperti fashion show pakaian tradisional, lomba membaca puisi karya R.A. Kartini, dan lomba menulis surat seperti yang dilakukan Kartini pada masanya. Para siswa tampak antusias mengikuti setiap kegiatan yang diselenggarakan.</p>
                <p>"Saya senang sekali bisa mengenakan kebaya dan belajar tentang perjuangan R.A. Kartini. Beliau adalah inspirasi bagi saya untuk terus belajar dengan giat," ungkap Zahra, siswa kelas 5 yang menjadi juara pertama lomba membaca puisi.</p>
                <p>Tidak hanya lomba, acara juga diisi dengan penampilan tari tradisional dan modern yang dibawakan oleh siswa-siswi berbakat. Penampilan drama musikal yang menceritakan perjalanan hidup R.A. Kartini menjadi puncak acara yang mendapat apresiasi meriah dari seluruh hadirin.</p>
                <p>"Kami ingin anak-anak tidak hanya mengenal sosok R.A. Kartini sebagai pahlawan emansipasi wanita, tetapi juga memahami nilai-nilai perjuangannya yang relevan dengan kehidupan mereka saat ini," jelas Ibu Dewi, koordinator acara sekaligus guru Bahasa Indonesia.</p>
                <p>Perayaan Hari Kartini ditutup dengan penyerahan hadiah kepada para pemenang lomba dan foto bersama. Acara ini menjadi salah satu tradisi tahunan SD Muhammadiyah 1 Ketelan Surakarta yang selalu dinantikan oleh seluruh warga sekolah.</p>'
        ];
        
        return isset($contents[$id]) ? $contents[$id] : '<p>Konten berita tidak tersedia.</p>';
    }
}