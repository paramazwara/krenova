    <!-- Footer Start -->

    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div
                        class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="" class="navbar-brand">
                            <h1 class="m-0 text-white"><i class="fas fa-lightbulb"></i> {{ config('app.name') }}</h1>
                        </a>
                        <span class="badge badge-pill badge-danger text-warning">Electronic System : Kreativitas dan Inovasi Masyarakat</span>
                        <p class="mt-3 mb-4">Merupakan portal sebagai wadah yang menampung Kreativitas dan Inovasi
                            Masyarakat Kota Salatiga.</p>
                        <div class="input-group">
                            @if (isset($account) && $account !== 'null')
                            <a href="{{ route('sso') }}"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Masuk/Daftar</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">BAPPEDA Kota Salatiga</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">Jl. Letjend. Sukowati No. 51, Salatiga </p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">bappeda@salatiga.go.id</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+6298 325332</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                                    href="https://www.facebook.com/bappedasala3/"><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                                    href="https://www.instagram.com/bappeda_sala3/"><i
                                        class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Tautan Pintas</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="/"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Beranda</a>
                                <a class="text-light mb-2" href="innovation"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Inovasi</a>
                                <a class="text-light mb-2" href="awards"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Penghargaan</a>
                                <a class="text-light mb-2" href="testimonials"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Testimonial</a>
                                <a class="text-light" href="teams"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Tim Krenova</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Tautan Terkait</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="http://bappeda.salatiga.go.id" target="_blank"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>BAPPEDA SALATIGA</a>
                                <a class="text-light mb-2" href="http://salatiga.go.id" target="_blank"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>PEMKOT SALATIGA</a>
                                <a class="text-light mb-2" href="http://jatengprov.go.id" target="_blank"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>PROV JATENG</a>
                                <a class="text-light mb-2" href="https://brida.jatengprov.go.id/" target="_blank"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>BRIDA PROV JATENG</a>
                                <a class="text-light mb-2" href="https://pindah.jatengprov.go.id" target="_blank"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>KRENOVA JATENG</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="">BAPPEDA Kota
                                Salatiga</a>. All Rights Reserved. Designed by <a class="text-white border-bottom"
                                href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.7.0/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.7.0/css/colReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap.min.css">

</body>

</html>
