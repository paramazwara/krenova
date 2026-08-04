@extends('layouts.header')

@section('dashboard')

    <div class="container-fluid py-5 wow fadeInUp" id="dasboard" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                      <li class="breadcrumb-item"><a href="/inventor">Inventor</a></li>
                                      <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
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

                                <form class="row g-3" method="POST" name="formInventor" id="formInventor" action="/inventor/save" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row col-md-12 g-3">
                                        <div class="col-md-6">
                                        <label for="i_kategori" class="form-label">Kategori</label>
                                        <select id="i_kategori" name="i_kategori" class="form-select">
                                            <option value="">(Pilih Kategori)</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k['id'] }}" {{ ( $k['id'] == $inventor[0]['kategori'] ) ? 'selected' : '' }}>{{ $k['teks'] }}</option>
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
                                                    <option value="{{ $t['id'] }}" {{ ( $t['id'] == $inventor[0]['tipe'] ) ? 'selected' : '' }}>{{ $t['tipe'] }}</option>
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
                                            value="{{ $inventor[0]['p_nik'] }}">
                                            @if ($errors->has('i_nik'))
                                            <span class="text-danger">{{ $errors->first('i_nik') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <label for="i_nama" class="form-label">Nama Lengkap</label>
                                            <input type="text" maxlength="100" minlength="5" class="form-control" name="i_nama" id="i_nama"
                                            placeholder="Nama Lengkap sesuai kartu identitas"
                                            value="{{ $inventor[0]['p_nama'] }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="i_pekerjaan" class="form-label">Pekerjaan</label>
                                            <select id="i_pekerjaan" name="i_pekerjaan" class="form-select selectpicker" data-live-search="true">
                                                <option value="">(Pilih Pekerjaan)</option>
                                                @foreach ($pekerjaan as $j)
                                                    <option value="{{ $j['id'] }}" {{ ( $j['id'] == $inventor[0]['p_pekerjaan'] ) ? 'selected' : '' }}>{{ $j['nama'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="i_pendidikan" class="form-label">Jenjang Pendidikan saat ini</label>
                                            <select id="i_pendidikan" name="i_pendidikan" class="form-select">
                                                <option value="">(Pilih Jenjang Pendidikan)</option>
                                                @foreach ($pendidikan as $p)
                                                    <option value="{{ $p['id'] }}" {{ ( $p['id'] == $inventor[0]['p_pendidikan'] ) ? 'selected' : '' }}>{{ $p['nama'] }}</option>
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
                                                <input hidden type="text" value="" name="i_oldktp" id="i_oldktp">
                                                <input type="text" placeholder="Unggah Kartu Identitas" disabled value="{{ $inventor[0]['p_foto_ktp'] }}" class="form-control" name="i_ktp" id="i_ktp">
                                                <div class="input-group-append">
                                                <button id="btnDelKtp" type="button" class="btn btn-danger font-size-sm" title="Hapus foto yang tersimpan"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <picture>
                                            <img id="imgKtp" height="200" src="{{ ( $inventor[0]['p_foto_ktp'] ) ? asset("images/idcard") . "/" . $inventor[0]['p_foto_ktp'] : asset("images/idcard/ktp-null.jpg") }}" class="rounded mx-auto d-block">
                                            </picture>
                                        </div>

                                    </div>

                                    <div id="fKelompok" class="row col-md-12 g-3">
                                            <div class="col-md-6">
                                                <label for="k_nama" class="form-label">Nama Kelompok</label>
                                                <input type="text" maxlength="100" minlength="5" class="form-control" name="k_nama" id="k_nama"
                                                placeholder="Nama Kelompok Anda"
                                                value="{{ $inventor[0]['k_nama'] }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="k_lembaga" class="form-label">Lembaga / Instansi</label>
                                                <input type="text" maxlength="100" minlength="5" class="form-control" name="k_lembaga" id="k_lembaga"
                                                placeholder="Nama Lembaga (SD,SMP,Univ,Kantor,OPD,dsb)"
                                                value="{{ $inventor[0]['k_lembaga'] }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="k_ketua" class="form-label">Nama Ketua Kelompok</label>
                                                <input type="text" maxlength="100" minlength="5" class="form-control" name="k_ketua" id="k_ketua"
                                                placeholder="Nama Ketua Kelompok / Penanggungjawab"
                                                value="{{ $inventor[0]['k_ketua'] }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="k_anggota1" class="form-label">Nama Anggota 1</label>
                                                <input type="text" maxlength="100" minlength="5" class="form-control" name="k_anggota1" id="k_anggota1"
                                                placeholder="Nama Anggota 1"
                                                value="{{ $inventor[0]['k_anggota1'] }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="k_anggota2" class="form-label">Nama Anggota 2</label>
                                                <input type="text" maxlength="100" minlength="1" class="form-control" name="k_anggota2" id="k_anggota2"
                                                placeholder="Nama Anggota 2"
                                                value="{{ $inventor[0]['k_anggota2'] }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="k_anggota3" class="form-label">Nama Anggota 3</label>
                                                <input type="text" maxlength="100" minlength="1" class="form-control" name="k_anggota3" id="k_anggota3"
                                                placeholder="Nama Anggota 3"
                                                value="{{ $inventor[0]['k_anggota3'] }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="k_anggota4" class="form-label">Nama Anggota 4</label>
                                                <input type="text" maxlength="100" minlength="1" class="form-control" name="k_anggota4" id="k_anggota4"
                                                placeholder="Nama Anggota 4"
                                                value="{{ $inventor[0]['k_anggota4'] }}">
                                            </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>

                                    <div id="fGeneral" class="row col-md-12 g-3">
                                        <div class="col-md-6">
                                            <label for="i_telp" class="form-label">Nomor Ponsel / Whatsapp</label>
                                            <input type="tel" pattern="[0-9]+" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                            minlength="10" maxlength="15" class="form-control" name="i_telp" id="i_telp" placeholder="Nomor ponsel yang dapat dihubungi"
                                            value="{{ $inventor[0]['telepon'] }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="i_alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" name="i_alamat" id="i_alamat" placeholder="Alamat sesuai kartu identitas"
                                            value="{{ $inventor[0]['alamat'] }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="i_kecamatan" class="form-label">Kecamatan</label>
                                            <select id="i_kecamatan" name="i_kecamatan" class="form-select">
                                                <option value="">(Pilih Kecamatan)</option>
                                                @foreach ($kecamatan as $kec)
                                                    <option value="{{ $kec['id'] }}" {{ ( $kec['id'] == $inventor[0]['id_kec'] ) ? 'selected' : '' }}>{{ $kec['nama_kec'] }}</option>
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
                                                <input type="text" placeholder="Unggah foto diri / kelompok" disabled value="{{ $inventor[0]['foto_diri'] }}" class="form-control" name="i_selfie" id="i_selfie">
                                                <div class="input-group-append">
                                                <button id="btnDelSelfie" type="button" class="btn btn-danger font-size-sm" title="Hapus foto yang tersimpan"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <picture>
                                            <img id="imgSelfie" height="200" src="{{ ( $inventor[0]['foto_diri'] ) ? asset("images/selfie") . "/" . $inventor[0]['foto_diri'] : asset("images/selfie/img-null.jpg") }}" class="rounded mx-auto d-block">
                                            </picture>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" checked type="hidden" name="i_state" id="i_state" onclick="document.getElementById('i_save').disabled = !document.getElementById('i_state').checked">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="hidden" name="i_id" value="{{ $inventor[0]['id'] }}">
                                        <button name="i_save" id="i_save" value="update" type="submit" class="btn btn-primary">Simpan</button>
                                        <a class="btn btn-outline-danger" href="/inventor" role="button">Batalkan</a>
                                    </div>

                                </form>
                                {{-- form --}}


                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <button onclick="reject({{ $inventor[0]['id'] }})" name="i_reject" id="i_reject" value="{{ $inventor[0]['id'] }}" type="button" class="btn btn-outline-danger" title="Tolak Inventor"><i class="bi bi-person-fill-x"></i> Tolak</button>
                                    <button onclick="revise({{ $inventor[0]['id'] }})" name="i_revise" id="i_revise" value="{{ $inventor[0]['id'] }}" type="button" class="btn btn-outline-primary"><i class="bi bi-person-fill-exclamation"></i> Perlu Perbaikan</button>
                                    <button name="i_validate" id="i_validate" value="{{ $inventor[0]['id'] }}" type="button" class="btn btn-outline-success"><i class="bi bi-person-fill-check"></i> Validasi</button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>

function reject(id){
    Swal.fire({
            title: "Tolak Data Inventor",
            text: "Mengapa menolak inventor ini ?",
            input: "textarea",
            inputAttributes: {
                autocapitalize: "off"
            },
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Tolak",
        cancelButtonText: "Batal",
        closeOnConfirm: true,
        closeOnCancel: true
  }).then( reason => {
    if (reason.isConfirmed && reason.value) {
        console.log("Rej >> " + reason.value)
        $.ajax({
            url: '/inventor/reject',
            cache: false,
            data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                "id": id,
                "reason" : reason
            },
            success:function(response){
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        });

        //Swal.fire({ title: 'Ditolak', text: 'Berhasil ditolak karena' + reason })
    }
  });
}

function revise(id){
    Swal.fire({
            title: "Revisi Data Inventor",
            text: "Perbaikan apa saja yang perlu dilakukan? Sampaikan di bawah ini",
            input: "textarea",
            inputAttributes: {
                autocapitalize: "off"
            },
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Perlu Perbaikan",
        cancelButtonText: "Batal",
        closeOnConfirm: true,
        closeOnCancel: true
  }).then( reason => {
    if (reason.value) console.log("Rev >> " + reason.value)
    // Swal.fire({ title: 'Ditolak', text: 'Berhasil ditolak karena' + reason })
  });
}

        function rejects(id){
            //swal begin
            Swal.fire({
            title: "Beri alasan mengapa ditolak",
            input: "text",
            inputAttributes: {
                autocapitalize: "off"
            },
            showCancelButton: true,
            confirmButtonText: "Tolak",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,

            preConfirm: async (reason) => {
                try {
                    const respon = await fetch('/inventor/reject/'+id);
                    if (!respon.ok){
                        //return Swal.showValidationMessage();
                    }
                    console.log(respon.json());
                } catch (error) {
                Swal.showValidationMessage(
                    `Request failed: ${error}`);
                }
            },

            allowOutsideClick: () => !Swal.isLoading()

            },
            function(isConfirm){}
            ).then((result) => {

                console.log("no pain");
                /*
                $.ajax({
                                url: '/inventor/reject/' + $('#i_reject').val(),
                                type: "POST",
                                success:function(){
                                    Swal.fire(
                                        'BERHASIL',
                                        'Data Inventor berhasil ditolak !',
                                        'success',
                                    );
                                },
                        });
                */

            }); // end swal

            };

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

        // $('#i_reject').click(function(id){

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
                                if ( kelurahan.id === {{ $inventor[0]['id_kel'] }} ) sel = 'selected';
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" crossorigin="anonymous"></script>

@endsection

