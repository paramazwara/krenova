<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - {{ config('app.description') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Krenova, Kreativitas dan Inovasi, Kota Salatiga" name="keywords">
    <meta content="Krenova - Kreativitas dan Inovasi Kota Salatiga" name="description">

    <!-- Favicon -->
    <link href="img/bulb.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block" id="top">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Jl. Letjend. Sukowati No. 51,
                        Salatiga</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+6298 325332</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>bappeda@salatiga.go.id</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                            class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="https://www.facebook.com/bappedasala3/"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                            class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="https://www.instagram.com/bappeda_sala3/"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="#"><i
                            class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="/" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fas fa-lightbulb me-2"></i>{{ config('app.name') }}</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <?php
                        $account = (!isset($request)) ? null : $request->session()->get('gAccount', 'null');
                    ?>

                    @if (isset($account) && $account !== 'null')
                        <a href="home" class="nav-item nav-link {{  request()->routeIs('home') ? 'active' : '' }}">Dashboard</a>
                        <a href="inventor" class="nav-item nav-link {{  request()->routeIs('inventor') ? 'active' : '' }}">Profil Inventor</a>
                        <a href="inovasi" class="nav-item nav-link {{  request()->routeIs('inovasi') ? 'active' : '' }}">Profil Inovasi</a>
                        <a href="kuesioner" class="nav-item nav-link {{  request()->routeIs('kuesioner') ? 'active' : '' }}">Kuesioner</a>
                        <a href="penilaian" class="nav-item nav-link {{  request()->routeIs('penilaian') ? 'active' : '' }}">Hasil Penilaian</a>
                        <a href="info" class="nav-item nav-link {{  request()->routeIs('info') ? 'active' : '' }}">Informasi</a>
                    @else
                    <a href="/" class="nav-item nav-link {{  request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                    <a href="about" class="nav-item nav-link {{  request()->routeIs('about') ? 'active' : '' }}">Tentang Krenova</a>
                    <a href="#innovation" class="nav-item nav-link {{  request()->routeIs('innovation') ? 'active' : '' }}">Inovasi</a>
                    <a href="#awards" class="nav-item nav-link {{  request()->routeIs('awards') ? 'active' : '' }}">Penghargaan</a>
                    <a href="#testimonials" class="nav-item nav-link {{  request()->routeIs('testimonials') ? 'active' : '' }}">Testimonial</a>
                    <a href="#contacts" class="nav-item nav-link {{  request()->routeIs('contacts') ? 'active' : '' }}">Kontak</a>
                    @endif
                </div>
                @if (isset($account) && $account !== 'null')
                    <a href="{{ route('logout') }}" class="btn btn-primary py-2 px-4 ms-3">Keluar</a>
		@else
                    <a href="{{ route('sso') }}" class="btn btn-primary py-2 px-4 ms-3">Masuk / Daftar</a>
                @endif

            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100"
                        src="https://bappeda.salatiga.go.id/wp-content/uploads/2021/08/IMG_7360-1-1024x683.jpg"
                        alt="Pendaftaran Juri Lomba Krenova">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Pendaftaran Juri</h5>
                            <h3 class="display-1 text-white mb-md-4 animated zoomIn">Pendaftaran Juri Lomba Krenova
                                Tahun 2022 dibuka pada bulan April s.d. Mei</h3>
                            <a href="{{ route('sso') }}"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Daftar</a>
                            <a href="tel:+6298325332"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Kontak</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100"
                        src="https://bappeda.salatiga.go.id/wp-content/uploads/2021/08/PicsArt_08-24-02.58.17-1024x729.jpg"
                        alt="Presentasi 10 Besar Peserta Lomba Krenova Tahun 2022">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Pendaftaran Peserta</h5>
                            <h3 class="display-1 text-white mb-md-4 animated zoomIn">Pendaftaran Peserta Lomba Krenova
                                Tahun 2022 dibuka pada bulan Mei s.d. Juli</h3>
                            <a href="{{ route('sso') }}"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Daftar</a>
                            <a href="tel:+6298325335"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Kontak</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
    <!-- Navbar & Carousel End -->


    <!-- counter Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4"
                        style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Jumlah Pendaftar</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4"
                        style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Telah Diverifikasi</h5>
                            <h1 class="mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4"
                        style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Jumlah Inovasi</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter Start -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" id="about" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
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


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" id="innovation" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Tema Inovasi</h5>
                <h1 class="mb-0">10 Fokus Bidang Inovasi Lomba Krenova</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.3s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-shield-alt text-white"></i>
                        </div>
                        <h4 class="mb-3">Agribisnis</h4>
                        <p class="m-0">Agribisnis dan Ketahanan Pangan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-chart-pie text-white"></i>
                        </div>
                        <h4 class="mb-3">Energi</h4>
                        <p class="m-0">Energi Baru dan Terbarukan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.9s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-code text-white"></i>
                        </div>
                        <h4 class="mb-3">Hutan</h4>
                        <p class="m-0">Hutan dan Lingkungan Hidup</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.3s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fab fa-android text-white"></i>
                        </div>
                        <h4 class="mb-3">Kelautan</h4>
                        <p class="m-0">Kelautan dan Perikanan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-search text-white"></i>
                        </div>
                        <h4 class="mb-3">Kesehatan</h4>
                        <p class="m-0">Kesehatan, Obat-obatan dan Kosmetika</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.9s">
                    <a href="{{ route('sso') }}">
                        <div
                            class="service-item bg-primary rounded d-flex flex-column align-items-center justify-content-center text-center p-5">
                            <p class="text-white mb-3">Punya inovasi menarik dan inovatif ?</p>
                            <h3 class="text-white mb-3">Daftarkan!</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <a href="tel:+6298325332">
                        <div
                            class="service-item bg-primary rounded d-flex flex-column align-items-center justify-content-center text-center p-5">
                            <p class="text-white mb-3">Info lebih lanjut hubungi kami</p>
                            <h4 class="text-white mb-0">+6298 325332</h4>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-search text-white"></i>
                        </div>
                        <h4 class="mb-3">Pendidikan</h4>
                        <p class="m-0">Pendidikan Formal dan Non Formal</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-search text-white"></i>
                        </div>
                        <h4 class="mb-3">Rekayasa</h4>
                        <p class="m-0">Rekayasa Teknologi dan Manufaktur</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-search text-white"></i>
                        </div>
                        <h4 class="mb-3">TI</h4>
                        <p class="m-0">Teknologi Informasi dan Komunikasi</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-search text-white"></i>
                        </div>
                        <h4 class="mb-3">Kreatif</h4>
                        <p class="m-0">Industri Kreatif</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-search text-white"></i>
                        </div>
                        <h4 class="mb-3">Sosial</h4>
                        <p class="m-0">Sosial dan Budaya</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5 wow fadeInUp" id="awards" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Hadiah & Penghargaan</h5>
                <h1 class="mb-0">JUARA UMUM</h1>
            </div>
            <div class="row g-0">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Juara II</h4>
                            <small class="text-uppercase">Kategori Umum</small>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">Rp.</small>2.5<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">juta</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>Trophy Juara II</span><i
                                    class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Piagam Juara II</span><i
                                    class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Piagam Peserta</span><i
                                    class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Penyerahan hadiah oleh Wakil Wali
                                    Kota</span><i class="fa fa-check text-primary pt-1"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Juara I</h4>
                            <small class="text-uppercase">Kategori Umum</small>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">Rp.</small>3.0<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">juta</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>Trophy Juara I</span><i
                                    class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Piagam Juara I</span><i
                                    class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Piagam Peserta</span><i
                                    class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Penyerahan hadiah oleh Wali
                                    Kota</span><i class="fa fa-check text-primary pt-1"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Juara III</h4>
                            <small class="text-uppercase">Kategori Umum</small>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">Rp.</small>2.0<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">juta</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>Trophy Juara III</span><i
                                    class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Piagam Juara III</span><i
                                    class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Piagam Peserta</span><i
                                    class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Penyerahan hadiah oleh Sekretaris
                                    Daerah</span><i class="fa fa-check text-primary pt-1"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" id="testimonials" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Testimonial</h5>
                <h1 class="mb-0">Apa kata para peserta dan juri mengenai Lomba Krenova?</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/testimonial-1.jpg" style="width: 60px; height: 60px;">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Client Name</h4>
                            <small class="text-uppercase">Profession</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/testimonial-2.jpg" style="width: 60px; height: 60px;">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Client Name</h4>
                            <small class="text-uppercase">Profession</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/testimonial-3.jpg" style="width: 60px; height: 60px;">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Client Name</h4>
                            <small class="text-uppercase">Profession</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/testimonial-4.jpg" style="width: 60px; height: 60px;">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Client Name</h4>
                            <small class="text-uppercase">Profession</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" id="contacts" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Tim Krenova</h5>
                <h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Full Name</h4>
                            <p class="text-uppercase m-0">Designation</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Full Name</h4>
                            <p class="text-uppercase m-0">Designation</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Full Name</h4>
                            <p class="text-uppercase m-0">Designation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

@extends('layouts.footer')
