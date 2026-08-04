@extends('layouts.header')

@section('dashboard')

    <div class="container-fluid py-5 wow fadeInUp" id="dasboard" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Error 404') }}</div>
                            <div class="card-body" style="height: 300px">
                                <div class="cover">
                                    <h1>Resource not found</h1>
                                    <p class="lead">The requested resource could not be found but may be available
                                        again in the future.
                                        <br /><a href="<?= url('/home') ?>">Back to home</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
