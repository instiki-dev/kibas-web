@extends('adminlte.main')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <style>
        input.form-control.form-control-sm:nth-child(1) {
            width: 150px;
        }
    </style>
@endsection


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Survey</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Kembali <i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                       Jawaban
                    </div>
                    <div class="card-body table-responsive p-2" style="height: 60vh;">
                        <table class="table table-bordered table-striped" id="data-tabel">
                            <thead>
                                <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">No Rekening</th>
                                <th class="text-center">Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="tableContent">
                                @foreach($data -> jawaban as $item)
                                <tr>
                                      <th scope="col">{{ $loop -> index + 1}}</th>
                                      <th scope="col">{{ $item -> pelanggan -> nama_pelanggan }}</th>
                                      <th scope="col">{{ $item -> rekening -> no_rekening }}</th>
                                    <th scope="col">
                                        <div class="d-inline">
                                            @for($i=0; $i < $item -> nilai; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            {{ $data -> pertanyaan }}
                        </h4>
                    </div>
                    <div class="card-body table-responsive p-2" style="height: 40vh;">
                        <table class="table table-bordered table-striped" id="data-tabel-2">
                            <thead>
                                <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Detail Pertanyaan</th>
                                <th class="text-center">Bobot</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="tableContent">
                                @foreach($data -> detail as $item)
                                <tr>
                                      <th scope="col">{{ $loop -> index + 1}}</th>
                                      <th scope="col">{{ $item -> keterangan }}</th>
                                      <th scope="col">{{ $item -> bobot }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
    <script src="/plugins/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
    $(function () {
        $("#data-tabel").DataTable({
            "responsive": true
        });
    });
    $(function () {
        $("#data-tabel-2").DataTable({
            "responsive": true
        });
    });
    </script>
@endsection
