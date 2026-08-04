@extends('layouts.header')

@section('dashboard')

    <div class="container-fluid py-5 wow fadeInUp" id="dasboard" data-wow-delay="0.1s">
        <div class="container py-5">

            <div class="container mt-5">
                <span class="text-center"><h2 class="mb-4">Data Inovasi</h2></span>
                <div class="py-4"><button name="i_add" id="i_add" type="submit" class="btn btn-primary">Tambah Inovasi</button></div>
                <table id="dataInovasi" class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Nama Inovasi</th>
                            <th>Status Inovasi</th>
                            <th>Tahun</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="container mt-5" id="frmInovasi">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Profil Inovasi') }}</div>
                            <div class="card-body">

                                {{-- form --}}
                                <form class="row g-3" method="POST" action="">
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


                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="i_state" id="i_state" onclick="document.getElementById('i_save').disabled = !document.getElementById('i_state').checked">
                                            <label class="form-check-label" for="i_state">
                                                Data inovasi yang saya isi adalah benar, dan saya siap mempertanggungjawabkannya
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button name="i_save" id="i_save" type="submit" disabled class="btn btn-primary">Simpan</button>
                                        <button name="i_close" id="i_close" type="button" class="btn btn-outline-success">Batal</button>
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

<script type="text/javascript">
    $(document).ready( function () {
        $( "#frmInovasi" ).hide();
        loadDataTable();
    });

    function loadDataTable(){
        var oTable = $('#dataInovasi').DataTable({
            processing: true,
            serverSide: true,
            colReorder: true,
            ajax: {
                url: '{{ url("getInovasiByInventor") }}'
            },
            columns: [
                {data: 'nama_inovasi', name: 'nama_inovasi'},
                {data: 'teks', name: 'teks'},
                {data: 'tahun', name: 'tahun'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
    };

    $("#i_close").click(function () {
        //clearForm
        $( "#frmInovasi" ).hide(1000);
    });

    $("#i_add").click(function () {
        $( "#frmInovasi" ).show(1000);
    });

    $('body').on('click', '.edit', function () {
        var idInovasi = $(this).attr('data-id');
        Swal.fire('Ubah ' + idInovasi, 'Mengubah' , 'success');
    });

    $('body').on('click', '.delete', function () {
            var idInovasi = $(this).attr('data-id');
            Swal.fire({
                title: "Kamu yakin ?",
                html: "Data inovasimu akan dihapus dan hilang.<br/>Jangan mencarinya lagi lho..",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Yaa..kiinnn",
                cancelButtonText: "Ga yakin sih"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/inovasi/del/') }}" + "/" + idInovasi,
                        dataType: 'JSON',
                        success: function (res) {
                            $('#dataInovasi').DataTable().ajax.reload();
                            Swal.fire(
                                'Berhasil',
                                res.msg,
                                'success'
                            )
                        }
                    });
                } else {
                    //abort
                }
            });

        });

</script>


@endsection
