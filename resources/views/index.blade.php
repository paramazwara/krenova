@extends('layouts.header')

@section('dashboard')

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" id="about" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">

                    <?php
                    /*
                    <div class="section-title position-relative pb-3 mb-5">
                            <h5 class="fw-bold text-primary text-uppercase">{{ $p->title->rendered }}</h5>
                            {{ $p->content->rendered }}
                    </div>
                    */
                    ?>

                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Electronic System Kreativitas & Inovasi Masyarakat</h5>
                        <h1 class="mb-0">Portal Resmi Krenova Kota Salatiga</h1>
                    </div>
                    <p class="mb-4">Electronic System Kreativitas dan Inovasi Masyarakat (esKRIM) adalah
			aplikasi yang memfasilitasi Lomba Krenova tingkat Kota Salatiga.</p>
                    <p class="mb-4">Badan Perencanaan , Penelitian dan Pengembangan Daerah
                        Kota Salatiga dalam mewujudkan visinya, perlu didorong untuk memperkuat basis produksi
                        masyarakat, yang ditopang dengan sarana produksi, teknologi dan inovasi yang handal.
                        Untuk itu, diperlukan adanya upaya guna meningkatkan kreativitas dan inovasi masyarakat berupa
                        teknologi dan
                        inovasi yang bermanfaat dan mudah diterapkan bagi peningkatan kesejahteraan masyarakat melalui
                        Penyelenggaraan Lomba Kreativitas dan Inovasi Masyarakat (KRENOVA). </p>
                    <p class="mb-4">Krenova dimaksudkan
                        untuk mendorong <i>innovation-driven</i> yaitu ekonomi yang dibangun atas dasar IPTEK yang
                        bernilai tambah tinggi agar terbentuk budaya kreatif dan inovatif, sekaligus memberikan
                        penghargaan kepada masyarakat Kota Salatiga baik secara individu maupun
                        kelompok yang telah mampu menjadi penggali, penemu dan atau pengembang di bidang IPTEK yang
                        hasil
                        karyanya secara nyata berhasil memajukan teknologi terapan, teruji dan terbukti kemanfaatannya
                        dalam meningkatkan
                        kesejahteraan masyarakat. Tujuan yang hendak dicapai adalah memilih kreativitas dan inovasi
                        teknologi terbaik dan memberikan fasilitas teknologi temuan masyarakat untuk dimanfaatkan
                        optimal. </p>
                </div>

                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="https://bappeda.salatiga.go.id/wp-content/uploads/2021/08/image.png"
                            style="object-fit: cover;" alt="Juara I Krenova 2021 - Monopoli Jateng Gayeng"
                            title="Juara I Krenova 2021 - Monopoli Jateng Gayeng">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Lomba Krenova</h5>
                <h1 class="mb-0">Memilih Kreativitas dan Inovasi yang Terbaik</h1>
            </div>

            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>Terbuka untuk umum</h4>
                            <p class="mb-0">Pendaftaran peserta Lomba Krenova dibuka bagi masyarakat Kota
                                Salatiga secara umum.</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4>Penghargaan</h4>
                            <p class="mb-0">Pemenang berhak mendapatkan hadiah pembinaan dan penghargaan dari
                                Wali Kota Salatiga.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s"
                            src="https://bappeda.salatiga.go.id/wp-content/uploads/2021/08/IMG_7360-1-1024x683.jpg"
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4>Juri Profesional</h4>
                            <p class="mb-0">Penilaian oleh juri profesional Non-ASN dari berbagai unsur
                                (akademisi, bisnis, media masa, dsb).</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4>Responsif</h4>
                            <p class="mb-0">Informasi lengkap hubungi Tim Krenova di +6298 325332<br />Senin
                                - Kamis : 07.00 - 15.30 <br /> Jumat : 07.00 - 11.00 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Start -->
@endsection
