
    <!-- Navbar & Carousel Start -->
    <div class="container-fluid bg-dark position-relative p-0">

        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="/" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fas fa-ice-cream me-2"></i>{{ config('app.name') }}</h1>
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
                        <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ request()->routeIs('any') || request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                    @endif
                        {{-- <a href="home" class="nav-item nav-link {{  request()->routeIs('any') || request()->routeIs('home') ? 'active' : '' }}">Dashboard</a>
                        <a href="inventor" class="nav-item nav-link {{  request()->routeIs('inventor') ? 'active' : '' }}">Profil Inventor</a>
                        <a href="inovasi" class="nav-item nav-link {{  request()->routeIs('inovasi') ? 'active' : '' }}">Profil Inovasi</a>
                        <a href="kuesioner" class="nav-item nav-link {{  request()->routeIs('kuesioner') ? 'active' : '' }}">Kuesioner</a>
                        <a href="penilaian" class="nav-item nav-link {{  request()->routeIs('penilaian') ? 'active' : '' }}">Hasil Penilaian</a>
                        <a href="info" class="nav-item nav-link {{  request()->routeIs('info') ? 'active' : '' }}">Informasi</a> --}}
                    {{-- @else --}}
                        <a href="{{ route('index') }}" class="nav-item nav-link {{ request()->routeIs('index') ? 'active' : '' }}">Beranda</a>
                        <a href="{{ route('innovations') }}" class="nav-item nav-link {{ request()->routeIs('innovations') ? 'active' : '' }}">Inovasi</a>
                        <a href="{{ route('awards') }}" class="nav-item nav-link {{ request()->routeIs('awards') ? 'active' : '' }}">Penghargaan</a>
                        <a href="{{ route('testimonials') }}" class="nav-item nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}">Testimonial</a>
                        <a href="{{ route('teams') }}" class="nav-item nav-link {{ request()->routeIs('teams') ? 'active' : '' }}">Tim Krenova</a>
                    {{-- @endif --}}
                </div>&nbsp;&nbsp;

                @if (isset($account) && $account !== 'null')
                    {{-- <a href="{{ route('logout') }}" class="btn btn-primary py-2 px-4 ms-3">Keluar</a> --}}
<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      {{ $account['email'] }}
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item {{  request()->routeIs('any') || request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item {{  request()->routeIs('inventor') ? 'active' : '' }}" href="{{ route('inventor') }}">Profil Inventor</a></li>
      <li><a class="dropdown-item {{  request()->routeIs('inovasi') ? 'active' : '' }}" href="{{ route('inovasi') }}">Profil Inovasi</a></li>
      <li><a class="dropdown-item {{  request()->routeIs('kuesioner') ? 'active' : '' }}" href="{{ route('kuesioner') }}">Kuesioner</a></li>
      <li><a class="dropdown-item {{  request()->routeIs('penilaian') ? 'active' : '' }}" href="penilaian">Penilaian</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item {{  request()->routeIs('informasi') ? 'active' : '' }}" href="informasi">Informasi</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="{{ route('logout') }}">Keluar</a></li>
    </ul>
  </div>

		        @else
                    <a href="{{ route('sso') }}" class="btn btn-primary py-2 px-4 ms-3">Masuk / Daftar</a>
                @endif

            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

@if( Route::currentRouteName() !== "sso" && !(isset($account) && $account !== 'null') )
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100"
                        src="https://asset-2.tstatic.net/jateng/foto/bank/images/peserta-krenova-memaparkan2.jpg"
                        alt="">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Sosialisasi</h5>
                            <h3 class="display-3 text-white mb-md-4 animated zoomIn">Sosialisasi Lomba Krenova
                                Tahun 2024 dilaksanakan pada Januari 2024</h3>
                            <a href="{{ route('sso') }}"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Daftar</a>
                            <a href="tel:+6298325332"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Kontak</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="w-100"
                        src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2021/08/11/2923592523.jpg"
                        alt="">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Pendaftaran Peserta</h5>
                            <h3 class="display-3 text-white mb-md-4 animated zoomIn">Pendaftaran Peserta Lomba Krenova
                                Tahun 2024 dibuka pada bulan Januari s.d. Maret</h3>
                            <a href="{{ route('sso') }}"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Daftar</a>
                            <a href="tel:+6298325332"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Kontak</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100"
                        src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/radarsemarang/2023/05/IMG_20230508_170030.jpg"
                        alt="">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Hadiah</h5>
                            <h3 class="display-3 text-white mb-md-4 animated zoomIn">Total Hadiah hingga Rp.15.000.000,-</h3>
                            <a href="{{ route('sso') }}"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Daftar</a>
                            <a href="tel:+6298325335"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Kontak</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100"
                        src="https://rasikafm.com/wp-content/uploads/2023/05/Lomba-Krenova-Kota-Salatiga-Dorong-Peningkatan-Inovasi-Masyarakat.webp"
                        alt="">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Sosialisasi</h5>
                            <h3 class="display-3 text-white mb-md-4 animated zoomIn">Sosialisasi Lomba Krenova
                                Tahun 2024 dilaksanakan pada Januari</h3>
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

@else

<div class="carousel-inner">
    <div class="carousel-item active">
        {{-- <img class="w-100" height="100" src="./img/bglogin.jpg"> --}}
        <img class="w-100" height="100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSV2sMaRdG0WFCWJso_Hzx9jJXm2Cy4q1f8Mg&usqp=CAU">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 900px;">
            </div>
        </div>
    </div>
</div>

@endif

        </div>

    </div>
    <!-- Navbar & Carousel End -->


