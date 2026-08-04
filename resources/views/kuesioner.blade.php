@extends('layouts.header')

@section('dashboard')

    <div class="container-fluid py-5 wow fadeInUp" id="dasboard" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Kuesioner Peserta') }}</div>
                            <div class="card-body">
<?php
// dd("");

?>
                                {{-- form --}}
                                <form class="row g-3" method="POST" action="">
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="i_state" id="i_state" onclick="document.getElementById('i_save').disabled = !document.getElementById('i_state').checked">
                                            <label class="form-check-label" for="i_state">
                                                Data yang saya isi adalah benar
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button name="i_save" id="i_save" type="submit" disabled=false class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                                {{-- form --}}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
