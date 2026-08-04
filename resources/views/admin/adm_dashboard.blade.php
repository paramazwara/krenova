@extends('layouts.header')

@section('dashboard')

    <div class="container-fluid py-5 wow fadeInUp" id="dashboard" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Admin : Dashboard') }}</div>
                            <div class="card-body">
                                <?php
                                if ( isset($request) ) $gAccount = $request->session()->get('gAccount', 'null');
                                ?>

                                @if (isset($gAccount) && $gAccount !== 'null')

                                <?php
                                //get user by mail. fetch user profiles
                                ?>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <a href="inventor" class="clearfix text-dark" style="text-decoration: none">
                                            <div class="card mb-3 bg-primary bg-gradient bg-opacity-50" style="mh-100; height:auto; cursor: pointer">
                                                <div class="row g-0">
                                                    <div class="col-md-4 icon">
                                                        <img src="https://png.pngtree.com/png-vector/20230814/ourmid/pngtree-cartoon-inventor-holding-an-electric-bulb-on-his-glasses-clipart-vector-png-image_6844682.png" class="img-fluid rounded-start m-1">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Jumlah Inventor</h5>
                                                            <p class="card-text">
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Belum Lengkap</div>
                                                                <div class="col-md-8">333</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Tervalidasi</div>
                                                                <div class="col-md-8">666</div>
                                                            </div>
                                                            </p>

                                                            <h5 class="card-title">Kategori</h5>
                                                            <p class="card-text">
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Pelajar</div>
                                                                <div class="col-md-8">555</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Umum</div>
                                                                <div class="col-md-8">444</div>
                                                            </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="card mb-3 text-dark bg-primary bg-gradient bg-opacity-25" style="mh-100; height:auto">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        000
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Rekap Inventor</h5>
                                                            <p class="card-text">
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Kecamatan A</div>
                                                                <div class="col-md-8">70</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Kecamatan B</div>
                                                                <div class="col-md-8">80</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Kecamatan C</div>
                                                                <div class="col-md-8">90</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Kecamatan D</div>
                                                                <div class="col-md-8">100</div>
                                                            </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="card mb-3 text-dark bg-success bg-gradient bg-opacity-50" style="mh-100; height:auto ">
                                                <div class="row g-0">
                                                    <div class="col-md-4 icon">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/10787/10787552.png" class="img-fluid rounded-start m-1">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Jumlah Inovasi</h5>
                                                            <p class="card-text">
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Belum Lengkap</div>
                                                                <div class="col-md-8">222</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Tervalidasi</div>
                                                                <div class="col-md-8">444</div>
                                                            </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card mb-3 text-dark bg-success bg-gradient bg-opacity-25" style="mh-100; height:auto">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        000
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Rekap Inovasi</h5>
                                                            <p class="card-text">
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Bidang A</div>
                                                                <div class="col-md-8">70</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Bidang B</div>
                                                                <div class="col-md-8">80</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Bidang C</div>
                                                                <div class="col-md-8">90</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Bidang D</div>
                                                                <div class="col-md-8">100</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Bidang E</div>
                                                                <div class="col-md-8">110</div>
                                                            </div>
                                                            <div class="row g-0 smaller-text">
                                                                <div class="col-md-4">Bidang F</div>
                                                                <div class="col-md-8">120</div>
                                                            </div>
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
