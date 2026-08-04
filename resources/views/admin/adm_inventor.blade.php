@extends('layouts.header')

@section('dashboard')

    <div class="container-fluid py-5 wow fadeInUp" id="inventorDashboard" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                      <li class="breadcrumb-item active" aria-current="page">Inventor</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="card-body">

                                @if(session()->has('inventorSaved'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session()->get('inventorSaved') }}
                                </div>
                                @endif

                                <?php
                                if ( isset($request) ) $gAccount = $request->session()->get('gAccount', 'null');
                                ?>

                                @if (isset($gAccount) && $gAccount !== 'null')

                                <?php
                                //get user by mail. fetch user profiles
                                ?>

                                    <div class="row table-responsive dataTables_wrapper dt-bootstrap5 no-footer">

                                        <span class="text-center"><h2 class="mb-4">Data Inventor</h2></span>
                                        <div class="py-4">
                                            <a href="inventorAdd" class="btn icon-link btn-primary btn-sm" alt="Tambah" title="Tambah data inventor"><i class="bi bi-person-add"></i> Tambah Inventor</a>
                                        </div>
                                        <table id="dataInventor" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed">
                                            <thead>
                                                <tr>
                                                    <th>Inventor</th>
                                                    <th>Status Inventor</th>
                                                    <th>Alamat</th>
                                                    <th>Kategori</th>
                                                    <th>Tipe</th>
                                                    <th>Contact Person</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
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

    <div class="modal fade" id="mConfirmDel" tabindex="-1" role="dialog" aria-labelledby="mConfirmDel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready( function () {
            loadDataTable();
        });

        $('body').on('click', '.delete-inventor', function () {
            var data_id = $(this).data('id');
            console.log("edit inventor : " + data_id);
            $('#mConfirmDel').modal('show');
        });

        function loadDataTable(){
            var oTable = $('#dataInventor').DataTable({
                processing: true,
                serverSide: true,
                colReorder: false,
                responsive: true,
                fixedHeader: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5', title: 'Data Inventor KRENOVA',
                        orientation: 'landscape', pageSize: 'A4'
                    },
                    {
                        extend: 'pdfHtml5', title: 'Data Inventor KRENOVA',
                        orientation: 'landscape', pageSize: 'A4'
                    },
                ],
                ajax: {
                    url: '{{ url("getInventors") }}'
                },
                columns: [
                    {data: 'inventor', name: 'inventor'},
                    {data: 'status_inventor', name: 'status_inventor'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'kategori', name: 'kategori'},
                    {data: 'tipe', name: 'tipe'},
                    {data: 'cp', name: 'cp'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false},
                ],
            });
        };
    </script>



@endsection
