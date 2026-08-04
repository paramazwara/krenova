@extends('layouts.header')

@section('formLogin')

<div class="container-fluid py-5 wow fadeInUp" id="login" data-wow-delay="0.1s">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="w-100"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTFJr5UOOaPwvqBnRMem5FC-m3gU_aAHs9iw&s">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 900px;">

                    @if(count($errors))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                @if (session('msg'))
                    <p>{{ session('msg') }}</p>
                @endif

                @if (!isset($_SESSION['u']))
                        <a href="{{ url('login') }}" class="btn btn-outline-light py-md-3 px-md-5 animated fadeInUp">
                           Masuk dengan Akun <i class="bi bi-google"></i>oogle
                        </a>
                @else

                    <hr />

                    <?php

                    if (isset($_SESSION['u'])) {
                        echo "<hr>{$_SESSION['u']->token} <hr>";
                        foreach ($_SESSION['u']->user as $a => $b) {
                            echo "$a | $b <br>";
                        }
                    } else {
                        echo 'Please login deh ---';
                        return route('sso');
                    }

                    //  session_destroy();

                    ?>

                @endif

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
