@extends('layouts.header')

@section('dashboard')

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

@endsection
