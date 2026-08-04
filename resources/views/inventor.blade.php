@extends('layouts.header')

@section('dashboard')

    <div class="container-fluid py-5 wow fadeInUp" id="dasboard" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Profil Inventor') }}</div>
                            <div class="card-body">
                                {{-- form --}}

                                {{-- @if(Session::has("success"))
                                <div class="alert alert-success">
                                    {{Session::get("success")}}
                                </div>
                                @elseif(Session::has("failed"))
                                    {{Session::get("failed")}}
                                @endif --}}

                                @if(session()->has('inventorSaved'))
                                <div class="alert alert-success">
                                    {{ session()->get('inventorSaved') }}
                                </div>
                                @endif

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

                                <form class="row g-3" method="POST" name="formInventor" action="/inventor/save" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row col-md-12 g-3">
                                        <div class="col-md-6">
                                        <label for="i_kategori" class="form-label">Kategori</label>
                                        <select id="i_kategori" name="i_kategori" class="form-select {{ $inventor[0]['kategori'] ? 'is-valid' : 'is-invalid' }}">
                                            <option hidden>Pilih Kategori</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k['id'] }}" {{ ( $k['id'] == $inventor[0]['kategori']) ? 'selected' : '' }} >{{ $k['kategori'] }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="i_tipe" class="form-label">Tipe</label>
                                            <select id="i_tipe" name="i_tipe" class="form-select {{ $inventor[0]['tipe'] ? 'is-valid' : 'is-invalid' }}">
                                                <option hidden>Pilih Tipe</option>
                                                @foreach ($tipe as $t)
                                                    <option value="{{ $t['id'] }}" {{ ( $t['id'] == $inventor[0]['tipe']) ? 'selected' : '' }} >{{ $t['tipe'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

<div class="row col-md-12 g-3" id="fPerseorangan">
                                    <div class="col-md-6">
                                        <label for="i_nik" class="form-label">NIK/NIS</label>
                                        <input type="text" pattern="[0-9]+" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                        maxlength="16" minlength="5" class="form-control {{ $inventor[0]['p_nik'] ? 'is-valid' : 'is-invalid' }}" name="i_nik" id="i_nik" placeholder="Nomor Identitas (tanpa tanda baca)"
                                        value="{{ $inventor[0]['p_nik'] ? $inventor[0]['p_nik'] : '' }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="i_nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" maxlength="100" minlength="5" class="form-control {{ $inventor[0]['p_nama'] ? 'is-valid' : 'is-invalid' }}" name="i_nama" id="i_nama"
                                        placeholder="Nama Lengkap sesuai kartu identitas"
                                        value="{{ $inventor[0]['p_nama'] ? $inventor[0]['p_nama'] : '' }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="i_pekerjaan" class="form-label">Pekerjaan</label>
                                        <select id="i_pekerjaan" name="i_pekerjaan" class="form-select {{ $inventor[0]['p_pekerjaan'] ? 'is-valid' : 'is-invalid' }}">
                                            <option hidden>Pilih Pekerjaan</option>
                                            @foreach ($pekerjaan as $j)
                                                <option value="{{ $j['id'] }}" {{ ( $j['id'] == $inventor[0]['p_pekerjaan']) ? 'selected' : '' }} >{{ $j['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="i_pendidikan" class="form-label">Jenjang Pendidikan saat ini</label>
                                        <select id="i_pendidikan" name="i_pendidikan" class="form-select {{ $inventor[0]['p_pendidikan'] ? 'is-valid' : 'is-invalid' }}">
                                            <option hidden>Pilih Jenjang</option>
                                            @foreach ($pendidikan as $p)
                                                <option value="{{ $p['id'] }}" {{ ( $p['id'] == $inventor[0]['p_pendidikan']) ? 'selected' : '' }} >{{ $p['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="i_fotoktp" class="form-label">Foto Kartu Identitas</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <input hidden type="file" accept=".jpeg,.jpg,.png,.gif" class="form-control" name="i_fotoktp" id="i_fotoktp" placeholder="Foto Kartu Identitas"
                                                aria-describedby="inputFotoKTP">
                                                <span>
                                                    <label title="Pilih Foto Kartu Identitas" class="input-group-text" style="cursor: pointer" for="i_fotoktp" id="inputFotoKTP">Pilih Foto</label>
                                                </span>
                                            </div>
                                            <input hidden type="text" value="{{ $inventor[0]['p_foto_ktp'] }}" name="i_oldktp" id="i_oldktp">
                                            <input type="text" placeholder="Unggah Kartu Identitas" disabled value="{{ $inventor[0]['p_foto_ktp'] }}" class="form-control {{ $inventor[0]['p_foto_ktp'] ? 'is-valid' : 'is-invalid' }}" name="i_ktp" id="i_ktp">
                                            <div class="input-group-append">
                                              <button id="btnDelKtp" type="button" class="btn btn-danger font-size-sm" title="Hapus foto yang tersimpan"><i class="bi bi-trash"></i></button>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <picture>
                                        <img id="imgKtp" height="200" src="./images/idcard/{{ ($inventor[0]['p_foto_ktp']=='') ? 'unknown.jpg' : $inventor[0]['p_foto_ktp'] }}" class="rounded mx-auto d-block"
                                         alt="{{ ($inventor[0]['p_foto_ktp']=='') ? 'Tidak ada kartu identitas' : $inventor[0]['p_foto_ktp'] }}"
                                         title="{{ ($inventor[0]['p_foto_ktp']=='') ? 'Tidak ada kartu identitas' : $inventor[0]['p_foto_ktp'] }}" >
                                        </picture>
                                    </div>

                                </div>

<div class="row col-md-12 g-3" id="fKelompok">
    <div class="col-md-6">
        <label for="k_nama" class="form-label">Nama Kelompok</label>
        <input type="text" maxlength="100" minlength="5" class="form-control {{ $inventor[0]['k_nama'] ? 'is-valid' : 'is-invalid' }}" name="k_nama" id="k_nama"
        placeholder="Nama Kelompok Anda"
        value="{{ $inventor[0]['k_nama'] ? $inventor[0]['k_nama'] : old('k_nama') }}">
    </div>
    <div class="col-md-6">
        <label for="k_lembaga" class="form-label">Lembaga / Instansi</label>
        <input type="text" maxlength="100" minlength="5" class="form-control {{ $inventor[0]['k_lembaga'] ? 'is-valid' : 'is-invalid' }}" name="k_lembaga" id="k_lembaga"
        placeholder="Nama Lembaga (SD,SMP,Univ,Kantor,OPD,dsb)"
        value="{{ $inventor[0]['k_lembaga'] ? $inventor[0]['k_lembaga'] : old('k_lembaga') }}">
    </div>
    <div class="col-md-6">
        <label for="k_ketua" class="form-label">Nama Ketua Kelompok</label>
        <input type="text" maxlength="100" minlength="5" class="form-control {{ $inventor[0]['k_ketua'] ? 'is-valid' : 'is-invalid' }}" name="k_ketua" id="k_ketua"
        placeholder="Nama Ketua Kelompok / Penanggungjawab"
        value="{{ $inventor[0]['k_ketua'] ? $inventor[0]['k_ketua'] : old('k_ketua') }}">
    </div>
    <div class="col-md-6">
        <label for="k_anggota1" class="form-label">Nama Anggota 1</label>
        <input type="text" maxlength="100" minlength="5" class="form-control {{ $inventor[0]['k_anggota1'] ? 'is-valid' : 'is-invalid' }}" name="k_anggota1" id="k_anggota1"
        placeholder="Nama Anggota 1"
        value="{{ $inventor[0]['k_anggota1'] ? $inventor[0]['k_anggota1'] : old('k_anggota1') }}">
    </div>
    <div class="col-md-6">
        <label for="k_anggota2" class="form-label">Nama Anggota 2</label>
        <input type="text" maxlength="100" minlength="1" class="form-control {{ $inventor[0]['k_anggota2'] ? 'is-valid' : 'is-invalid' }}" name="k_anggota2" id="k_anggota2"
        placeholder="Nama Anggota 2"
        value="{{ $inventor[0]['k_anggota2'] ? $inventor[0]['k_anggota2'] : old('k_anggota2') }}">
    </div>
    <div class="col-md-6">
        <label for="k_anggota3" class="form-label">Nama Anggota 3</label>
        <input type="text" maxlength="100" minlength="1" class="form-control {{ $inventor[0]['k_anggota3'] ? 'is-valid' : 'is-invalid' }}" name="k_anggota3" id="k_anggota3"
        placeholder="Nama Anggota 3"
        value="{{ $inventor[0]['k_anggota3'] ? $inventor[0]['k_anggota3'] : old('k_anggota3') }}">
    </div>
    <div class="col-md-6">
        <label for="k_anggota4" class="form-label">Nama Anggota 4</label>
        <input type="text" maxlength="100" minlength="1" class="form-control {{ $inventor[0]['k_anggota4'] ? 'is-valid' : 'is-invalid' }}" name="k_anggota4" id="k_anggota4"
        placeholder="Nama Anggota 4"
        value="{{ $inventor[0]['k_anggota4'] ? $inventor[0]['k_anggota4'] : old('k_anggota4') }}">
    </div>

</div>

<div class="row col-md-12 g-3" id="fGeneral">
    <div class="col-md-6">
        <label for="i_telp" class="form-label">Nomor Ponsel / Whatsapp</label>
        <input type="tel" pattern="[0-9]+" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
        minlength="10" maxlength="15" class="form-control {{ $inventor[0]['telepon'] ? 'is-valid' : 'is-invalid' }}" name="i_telp" id="i_telp" placeholder="Nomor ponsel yang dapat dihubungi"
        value="{{ $inventor[0]['telepon'] ? $inventor[0]['telepon'] : old('i_telp') }}">
    </div>
    <div class="col-md-6">
        <label for="i_alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control {{ $inventor[0]['alamat'] ? 'is-valid' : 'is-invalid' }}" name="i_alamat" id="i_alamat" placeholder="Alamat sesuai kartu identitas"
        value="{{ $inventor[0]['alamat'] ? $inventor[0]['alamat'] : old('i_alamat') }}">
    </div>
    <div class="col-md-3">
        <label for="i_kecamatan" class="form-label">Kecamatan</label>
        <select id="i_kecamatan" name="i_kecamatan" class="form-select {{ $inventor[0]['id_kec'] ? 'is-valid' : 'is-invalid' }}">
            <option hidden>Pilih Kecamatan</option>
            @foreach ($kecamatan as $kec)
                <option value="{{ $kec['id'] }}" {{ ( $kec['id'] == $inventor[0]['id_kec']) ? 'selected' : '' }}>{{ $kec['nama_kec'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="i_kelurahan" class="form-label">Kelurahan</label>
        <select id="i_kelurahan" name="i_kelurahan" class="form-select {{ $inventor[0]['id_kel'] ? 'is-valid' : 'is-invalid' }}">
            <option hidden>Pilih Kecamatan Terlebih Dahulu</option>
        </select>
    </div>
    <div class="col-md-6">
        <!--
        <label for="i_foto" class="form-label">Foto Diri / Kelompok</label>
        <input type="file" class="form-control" name="i_foto" id="i_foto">
        //-->
    </div>

    <div class="col-md-6">
        <label for="i_fotoselfie" class="form-label">Foto Diri / Kelompok</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <input hidden type="file" accept=".jpeg,.jpg,.png,.gif" class="form-control" name="i_fotoselfie" id="i_fotoselfie" placeholder="Foto Kartu Identitas"
                aria-describedby="inputFotoDiri">
                <span>
                    <label title="Foto Diri / Kelompok" class="input-group-text" style="cursor: pointer" for="i_fotoselfie" id="inputFotoDiri">Pilih Foto</label>
                </span>
            </div>
            <input hidden type="text" value="{{ $inventor[0]['foto_diri'] }}" name="i_oldselfie" id="i_oldselfie">
            <input type="text" placeholder="Unggah foto diri / kelompok" disabled value="{{ $inventor[0]['foto_diri'] }}" class="form-control {{ $inventor[0]['foto_diri'] ? 'is-valid' : 'is-invalid' }}" name="i_selfie" id="i_selfie">
            <div class="input-group-append">
              <button id="btnDelSelfie" type="button" class="btn btn-danger font-size-sm" title="Hapus foto yang tersimpan"><i class="bi bi-trash"></i></button>
            </div>
          </div>
    </div>
    <div class="col-md-6">
        <picture>
        <img id="imgSelfie" height="200" src="./images/selfie/{{ ($inventor[0]['foto_diri']=='') ? 'unknown.jpg' : $inventor[0]['foto_diri'] }}" class="rounded mx-auto d-block"
        alt="{{ ($inventor[0]['foto_diri']=='') ? 'Tidak ada penampakan' : $inventor[0]['foto_diri'] }}"
        title="{{ ($inventor[0]['foto_diri']=='') ? 'Tidak ada penampakan' : $inventor[0]['foto_diri'] }}">
        </picture>
    </div>

</div>

                    <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="i_state" id="i_state" onclick="document.getElementById('i_save').disabled = !document.getElementById('i_state').checked">
                                        <label class="form-check-label" for="i_state">
                                            Data profil yang saya isi adalah benar, dan saya siap mempertanggungjawabkannya
                                        </label>
                                    </div>
                    </div>
                    <div class="col-md-12">
                        <button name="i_save" id="i_save" type="submit" disabled=false class="btn btn-primary">Simpan</button>
                        <a class="btn btn-outline-success" href="dashboard" role="button">Dashboard</a>
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

    <script>
        $(document).ready(function() {

            $('#fPerseorangan').hide(500);
            $('#fKelompok').hide(500);
            $('#fGeneral').hide(500);
            $('#i_state').disabled=false;
            $('#i_save').disabled=false;

            $('#i_fotoktp').change(function(e){
                $('#i_ktp').val(e.target.files[0].name);
                if (e.target.files[0]){
                    let r = new FileReader();
                    r.onload = function(event){
                        $('#imgKtp').attr('alt', e.target.files[0].name);
                        $('#imgKtp').attr('src', event.target.result);
                    };
                    r.readAsDataURL(e.target.files[0]);
                }
            });

            $('#i_fotoselfie').change(function(e){
                $('#i_selfie').val(e.target.files[0].name);
                if (e.target.files[0]){
                    let r = new FileReader();
                    r.onload = function(event){
                        $('#imgSelfie').attr('alt', e.target.files[0].name);
                        $('#imgSelfie').attr('src', event.target.result);
                    };
                    r.readAsDataURL(e.target.files[0]);
                }
            });

            $('#btnDelKtp').click(function(){
                $('#i_ktp').val('');$('#i_oldktp').val('');$('#i_fotoktp').val('');
                $('#imgKtp').attr('src','');
                $('#imgKtp').attr('alt','');
            });

            $('#btnDelSelfie').click(function(){
                $('#i_selfie').val('');$('#i_oldselfie').val('');$('#i_fotoselfie').val('');
                $('#imgSelfie').attr('src','');
                $('#imgSelfie').attr('alt','');
            });

            $('#i_tipe').on('change', function() {
                changeTipe();
            });

            $('#i_kecamatan').on('change', function() {
                changeKec();
            });

            function changeTipe(){
                var tipe = $('#i_tipe').val();
                if (tipe == 1){
                    $('#fPerseorangan').show(500);
                    $('#fKelompok').hide(500);
                }else if(tipe == 2){
                    $('#fPerseorangan').hide(500);
                    $('#fKelompok').show(500);
                }else{
                    $('#fPerseorangan').hide(500);
                    $('#fKelompok').hide(500);
                }
                $('#fGeneral').show(500);
            }

            function changeKec(){
                var idKec = $('#i_kecamatan').val();
                if(idKec) {
                    $.ajax({
                       url: '/kelurahan/'+idKec,
                       type: "GET",
                       data : {"id":idKec},
                       success:function(data)
                       {
                         if(data){
                            $('#i_kelurahan').empty();
                            $('#i_kelurahan').append('<option hidden>Pilih Kelurahan</option>');
                            var kel = {{ $inventor[0]['id_kel'] }};
                            var sel='';
                            $.each(data, function(key, kelurahan){
                                if ( kelurahan.id===kel ){
                                    sel = 'selected';
                                }else{
                                    sel = '';
                                }
                                $('select[name="i_kelurahan"]').append('<option ' + sel + ' value="'+ kelurahan.id +'">' + kelurahan.nama_kel+ '</option>');
                            });
                        }else{
                            $('#i_kelurahan').empty();
                        }
                     }
                   });
                }else{
                    $('#i_kelurahan').empty();
                }
            }

            changeTipe(); changeKec();

        });


    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" crossorigin="anonymous"></script>

@endsection

