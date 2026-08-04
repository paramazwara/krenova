@extends('layouts.header')

@section('dashboard')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    span.select2.select2-container.select2-container--classic{
        width: 100% !important;
    }
</style>

    <div class="container-fluid py-5 wow fadeInUp" id="dasboard" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                      <li class="breadcrumb-item"><a href="inventor">Inventor</a></li>
                                      <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="card-body">

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

                                <form class="row g-3" method="POST" name="formInventor" id="formInventor" action="inventor/save" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row col-md-12 g-3">
                                        <div class="col-md-6">
                                        <label for="i_kategori" class="form-label">Kategori</label>
                                        <select id="i_kategori" name="i_kategori" class="form-select">
                                            <option value="">(Pilih Kategori)</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k['id'] }}" {{ ( $k['id'] == old('i_kategori') ) ? 'selected' : '' }}>{{ $k['teks'] }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('i_kategori'))
                                        <span class="text-danger">{{ $errors->first('i_kategori') }}</span>
                                        @endif
                                        </div>

                                        <div class="col-md-6">
                                            <label for="i_tipe" class="form-label">Tipe</label>
                                            <select id="i_tipe" name="i_tipe" class="form-select">
                                                <option value="">(Pilih Tipe)</option>
                                                @foreach ($tipe as $t)
                                                    <option value="{{ $t['id'] }}" {{ ( $t['id'] == old('i_tipe') ) ? 'selected' : '' }}>{{ $t['tipe'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('i_tipe'))
                                            <span class="text-danger">{{ $errors->first('i_tipe') }}</span>
                                            @endif
                                        </div>
                                    </div>

<div id="fPerseorangan" class="row col-md-12 g-3">
                                    <div class="col-md-6">
                                        <label for="i_nik" class="form-label">NIK/NIS</label>
                                        <input type="text" pattern="[0-9]+" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                        maxlength="16" minlength="5" class="form-control" name="i_nik" id="i_nik" placeholder="Nomor Identitas (tanpa tanda baca)"
                                        value="">
                                        @if ($errors->has('i_nik'))
                                        <span class="text-danger">{{ $errors->first('i_nik') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="i_nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" maxlength="100" minlength="5" class="form-control" name="i_nama" id="i_nama"
                                        placeholder="Nama Lengkap sesuai kartu identitas"
                                        value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="i_pekerjaan" class="form-label">Pekerjaan</label>
                                        <select id="i_pekerjaan" name="i_pekerjaan" class="form-select js-basic-single selectpicker" data-live-search="true">
                                            <option value="">(Pilih Pekerjaan)</option>
                                            @foreach ($pekerjaan as $j)
                                                <option value="{{ $j['id'] }}">{{ $j['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="i_pendidikan" class="form-label">Jenjang Pendidikan saat ini</label>
                                        <select id="i_pendidikan" name="i_pendidikan" class="form-select">
                                            <option value="">(Pilih Jenjang Pendidikan)</option>
                                            @foreach ($pendidikan as $p)
                                                <option value="{{ $p['id'] }}">{{ $p['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="i_fotoktp" class="form-label">Foto Kartu Identitas</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <input type="file" accept=".jpeg,.jpg,.png,.gif" class="form-control" name="i_fotoktp" id="i_fotoktp" placeholder="Foto Kartu Identitas"
                                                aria-describedby="inputFotoKTP">
                                                <span hidden>
                                                    <label title="Pilih Foto Kartu Identitas" class="input-group-text" style="cursor: pointer" for="i_fotoktp" id="inputFotoKTP">Pilih Foto</label>
                                                </span>
                                            </div>
                                            <input hidden type="text" value="" name="i_oldktp" id="i_oldktp">
                                            <input hidden type="text" placeholder="Unggah Kartu Identitas" disabled value="" class="form-control" name="i_ktp" id="i_ktp">
                                            <div class="input-group-append">
                                              <button id="btnDelKtp" type="button" class="btn btn-danger font-size-sm" title="Hapus foto yang tersimpan"><i class="bi bi-trash"></i></button>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <picture>
                                        <img id="imgKtp" height="200" src="./images/idcard/ktp-null.jpg" class="rounded mx-auto d-block">
                                        </picture>
                                    </div>

</div>

<div id="fKelompok" class="row col-md-12 g-3">
        <div class="col-md-6">
            <label for="k_nama" class="form-label">Nama Kelompok</label>
            <input type="text" maxlength="100" minlength="5" class="form-control" name="k_nama" id="k_nama"
            placeholder="Nama Kelompok Anda"
            value="">
        </div>
        <div class="col-md-6">
            <label for="k_lembaga" class="form-label">Lembaga / Instansi</label>
            <input type="text" maxlength="100" minlength="5" class="form-control" name="k_lembaga" id="k_lembaga"
            placeholder="Nama Lembaga (SD,SMP,Univ,Kantor,OPD,dsb)"
            value="">
        </div>

        <div class="col-md-6">
            <label for="k_ketua" class="form-label">Nama Ketua Kelompok</label>
            <input type="text" maxlength="100" minlength="5" class="form-control" name="k_ketua" id="k_ketua"
            placeholder="Nama Ketua Kelompok / Penanggungjawab"
            value="">
        </div>
        <div class="col-md-6">
            <label for="k_anggota1" class="form-label">Nama Anggota 1</label>
            <input type="text" maxlength="100" minlength="5" class="form-control" name="k_anggota1" id="k_anggota1"
            placeholder="Nama Anggota 1"
            value="">
        </div>
        <div class="col-md-6">
            <label for="k_anggota2" class="form-label">Nama Anggota 2</label>
            <input type="text" maxlength="100" minlength="1" class="form-control" name="k_anggota2" id="k_anggota2"
            placeholder="Nama Anggota 2"
            value="">
        </div>
        <div class="col-md-6">
            <label for="k_anggota3" class="form-label">Nama Anggota 3</label>
            <input type="text" maxlength="100" minlength="1" class="form-control" name="k_anggota3" id="k_anggota3"
            placeholder="Nama Anggota 3"
            value="">
        </div>
        <div class="col-md-6">
            <label for="k_anggota4" class="form-label">Nama Anggota 4</label>
            <input type="text" maxlength="100" minlength="1" class="form-control" name="k_anggota4" id="k_anggota4"
            placeholder="Nama Anggota 4"
            value="">
        </div>
</div>

<div id="fGeneral" class="row col-md-12 g-3">
        <div class="col-md-6">
            <label for="i_telp" class="form-label">Nomor Ponsel / Whatsapp</label>
            <input type="tel" pattern="[0-9]+" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
            minlength="10" maxlength="15" class="form-control" name="i_telp" id="i_telp" placeholder="Nomor ponsel yang dapat dihubungi"
            value="">
        </div>
        <div class="col-md-6">
            <label for="i_alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="i_alamat" id="i_alamat" placeholder="Alamat sesuai kartu identitas"
            value="">
        </div>
        <div class="col-md-6">
            <label for="i_kecamatan" class="form-label">Kecamatan</label>
            <select id="i_kecamatan" name="i_kecamatan" class="form-select">
                <option value="">(Pilih Kecamatan)</option>
                @foreach ($kecamatan as $kec)
                    <option value="{{ $kec['id'] }}">{{ $kec['nama_kec'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="i_kelurahan" class="form-label">Kelurahan</label>
            <select id="i_kelurahan" name="i_kelurahan" class="form-select">
                <option value="">Pilih Kecamatan Terlebih Dahulu</option>
            </select>
        </div>

        {{-- <div class="col-md-6">
            <label for="i_foto" class="form-label">Foto Diri / Kelompok</label>
            <input type="file" class="form-control" name="i_foto" id="i_foto">
        </div> --}}

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
                <input hidden type="text" value="" name="i_oldselfie" id="i_oldselfie">
                <input type="text" placeholder="Unggah foto diri / kelompok" disabled value="" class="form-control" name="i_selfie" id="i_selfie">
                <div class="input-group-append">
                <button id="btnDelSelfie" type="button" class="btn btn-danger font-size-sm" title="Hapus foto yang tersimpan"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <picture>
            <img id="imgSelfie" height="200" src="./images/selfie/img-null.jpg" class="rounded mx-auto d-block">
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
                        <a class="btn btn-outline-success" href="/inventor" role="button">Batal</a>
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
            $("#formInventor").validate({
            rules: {
                i_kategori: "required",
                i_tipe: "required",

                i_nik:  {
                    required: function(element){
                        return ($("#i_tipe").val()=="1") ? true : false;
                    },
                    minlength:5, maxlength:16
                },
                i_nama: {
                    required: function(element){
                        return ($("#i_tipe").val()=="1") ? true : false;
                    }
                },
                i_pekerjaan:  {
                    required: function(element){
                        return ($("#i_tipe").val()=="1") ? true : false;
                    }
                },
                i_pendidikan:  {
                    required: function(element){
                        return ($("#i_tipe").val()=="1") ? true : false;
                    }
                },
                i_fotoktp:  {
                    required: function(element){
                        return ($("#i_tipe").val()=="1") ? true : false;
                    },
                    extension: "png|jpg|jpeg|gif",
                    filesize: 1048576
                },

                i_telp: {
                    required: true, minlength:10
                },
                i_alamat: {
                    required: true, minlength: 5
                },
                i_kecamatan: "required",
                i_kelurahan: "required"
            },
            messages: {
                i_kategori: "Silahkan pilih Kategori",
                i_tipe: "Silahkan pilih Tipe",
                i_nik: "Ketik nomor kartu identitas",
                i_nama: {
                    required: "Ketik nama lengkap sesuai kartu identitas",
                },
                i_pekerjaan: "Silahkan pilih Pekerjaan",
                i_pendidikan: "Silahkan pilih Pendidikan",
                i_fotoktp: {
                    required: "Silahkan unggah kartu identitas",
                    extension: "Berkas diterima: jpeg, jpg, png, gif",
                    filesize: "Ukuran Maks. 1MB"
                },
                i_telp: {
                    required: "Ketikkan nomor WA aktif",
                    minlength: "Nomor WA minimal 10 angka"
                },
                i_alamat: {
                    required: "Ketikkan alamat lengkap",
                    minlength: "Alamat kurang lengkap"
                },
                i_kecamatan: "Silahkan pilih Kecamatan",
                i_kelurahan: "Silahkan pilih Kelurahan"

            },
            errorClass: "alert-danger",
            errorElement: "small",
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });

            $('#fPerseorangan').hide(500);
            $('#fKelompok').hide(500);
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
                    $('#fGeneral').show(500);
                }else if(tipe == 2){
                    $('#fPerseorangan').hide(500);
                    $('#fKelompok').show(500);
                    $('#fGeneral').show(500);
                }else{
                    $('#fPerseorangan').hide(500);
                    $('#fKelompok').hide(500);
                    $('#fGeneral').hide(500);
                }
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
                            $('#i_kelurahan').append('<option value="">(Pilih Kelurahan)</option>');
                            var sel='';
                            $.each(data, function(key, kelurahan){
                                sel = '';
                                $('select[name="i_kelurahan"]').append('<option ' + sel + ' value="'+ kelurahan.id +'">' + kelurahan.nama_kel+ '</option>');
                            });
                        }else{
                            $('#i_kelurahan').empty();
                        }
                     }
                   });
                }else{
                    $('#i_kelurahan').empty();
                    $('#i_kelurahan').append('<option value="">(Pilih Kecamatan terlebih dahulu)</option>');
                }
            }

            changeTipe(); changeKec();

        });


    </script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function(){
    $('.js-example-basic-single').select2({
        theme: "classic"
    });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" crossorigin="anonymous"></script>

@endsection

