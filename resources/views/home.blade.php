@extends('layouts.header')

@section('dashboard')

    <div class="container-fluid py-5 wow fadeInUp" id="dashboard" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>
                            <div class="card-body">
                                <?php
                                if ( isset($request) ) $gAccount = $request->session()->get('gAccount', 'null');
                                ?>

                                @if (isset($gAccount) && $gAccount !== 'null')

                                <?php
                                #dd($inventor);
                                //get user by mail. fetch user profiles
                                ?>

                                    <div class="row">


                                        <div class="col-md-3">
                                            <div class="card mb-3 text-dark bg-primary bg-opacity-50" style="mh-100;">
                                                <div class="row g-0">
                                                    <div class="row g-0">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Profil Inventor <a title="Ubah Profil Inventor" class="btn btn-sm icon-link" href="inventor" ><i class="bi bi-pencil-square"></i></a></h5>
                                                            <div class="row g-0">
                                                                <img src="./images/selfie/{{ ($inventor['foto_diri']) ? $inventor['foto_diri'] : 'unknown.jpg' }}" class="img-fluid" title="Profil Inventor">
                                                            </div>
                                                            <div class="smaller-text text-center">
                                                                {{ $inventor['p_nama'] }}
                                                            </div>
                                                            <div class="smaller-text text-center">
                                                                {{ $inventor['p_nik'] }}
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar {{ $persenInventorBg }}" role="progressbar"
                                                                    style="width: {{ $persenInventor }}%" aria-valuenow="{{ $persenInventor }}" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ $persenInventor }} %</div>
                                                            </div>
                                                            @if($persenInventor<100)
                                                                <div class="row g-0 smaller-text mt-3">
                                                                    <a class="btn btn-outline-primary" href="inventor" ><i class="fas fa-question-circle"></i> Lengkapi Profil Inventor</a>
                                                                </div>
                                                            @else
                                                            <div class="row g-0 smaller-text mt-3">
                                                                <p class="card-text smaller-text">
                                                                    <span style="color: #009900;"><i class="fas fa-check-circle"></i></span>
                                                                    <small class="">Sudah Lengkap</small>
                                                                    <span style="color: #990000;"><i class="fas fa-exclamation-circle"></i></span>
                                                                    <small class="">Belum Tervalidasi</small>
                                                                </p>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="card mb-3 text-dark bg-info bg-opacity-50" style="mh-100;">
                                                <div class="row g-0">
                                                    <div class="row g-0">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Profil Inovasi <a title="Ubah Profil Inovasi" class="btn btn-sm icon-link" href="inovasi" ><i class="bi bi-pencil-square"></i></a></h5>
                                                            <div class="row g-0">
                                                                {{-- <img src="./images/produk/{{ ($inovasi['f_foto_produk1']) ? $inovasi['f_foto_produk1'] : 'unknown.jpg' }}" class="img-fluid rounded-start" title="Profil Inovasi"> --}}
                                                                <img src="./images/selfie/{{ ($inventor['foto_diri']) ? $inventor['foto_diri'] : 'unknown.jpg' }}" class="img-fluid" title="Profil Inventor">
                                                            </div>
                                                            <p class="card-text">
                                                                <div class="row g-0 smaller-text">
                                                                    <div class="col-md-4">Nama Inovasi</div>
                                                                    <div class="col-md-8">999</div>
                                                                </div>
                                                                <div class="row g-0 smaller-text">
                                                                    <div class="col-md-4">Nama Inovasi</div>
                                                                    <div class="col-md-8">[ REKAP ]</div>
                                                                </div>
                                                            </p>
                                                            <div class="progress">
                                                                <div class="progress-bar {{ $persenInventorBg }}" role="progressbar"
                                                                    style="width: {{ $persenInventor }}%" aria-valuenow="{{ $persenInventor }}" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ $persenInventor }} %</div>
                                                            </div>
                                                            @if($persenInovasi<100)
                                                                <div class="row g-0 smaller-text mt-3">
                                                                    <a class="btn btn-outline-primary" href="inovasi" ><i class="fas fa-question-circle"></i> Lengkapi Profil Inovasi</a>
                                                                </div>
                                                            @else
                                                            <div class="row g-0 smaller-text mt-3">
                                                                <p class="card-text smaller-text">
                                                                    <span style="color: #009900;"><i class="fas fa-check-circle"></i></span>
                                                                    <small class="">Sudah Lengkap</small>
                                                                    <span style="color: #990000;"><i class="fas fa-exclamation-circle"></i></span>
                                                                    <small class="">Belum Tervalidasi</small>
                                                                </p>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="card mb-3 text-dark bg-success bg-opacity-50" style="mh-100; height: 250px">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img src="./img/team-1.jpg" class="img-fluid rounded-start" alt="">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Kuesioner Inovasi <a title="Ubah Kuesioner" class="btn btn-sm icon-link" href="kuesioner" ><i class="bi bi-pencil-square"></i></a></h5>
                                                            <p class="card-text">
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Nama Lengkap</div>
                                                                <div class="col-md-8">NAMA LENGKAP INVENTOR</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">NIK/NIS</div>
                                                                <div class="col-md-8">3373000100010001</div>
                                                            </div>
                                                            </p>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                                    aria-valuemax="100">100%</div>
                                                            </div>
                                                            <p class="card-text">
                                                            <div class="row g-0 smaller-text">
                                                                <button type="button" class="btn btn-warning" disabled data-bs-toggle="button" autocomplete="off"><i class="fas fa-question-circle"></i> Belum Divalidasi</button>
                                                            </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card mb-3 text-dark bg-secondary bg-opacity-50" style="mh-100; height: 250px">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img src="./img/team-2.jpg" class="img-fluid rounded-start" alt="">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Hasil Penilaian</h5>
                                                            <p class="card-text">
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Nama Lengkap</div>
                                                                <div class="col-md-8">NAMA LENGKAP INVENTOR</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">NIK/NIS</div>
                                                                <div class="col-md-8">3373000100010001</div>
                                                            </div>
                                                            </p>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                                    aria-valuemax="100">75%</div>
                                                            </div>
                                                            <p class="card-text">
                                                                <i class="fas fa-question-circle"></i>
                                                                <small class="text-white">Belum Lengkap</small>
                                                                <i class="fas fa-check-circle"></i>
                                                                <small class="text-white">Tervalidasi</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                @endif

                                <?php
                                 #print_r($inventor);
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
