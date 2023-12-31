@extends('adminlte.main')

@section('style')
    <style>
        #myTable_processing {
            position: absolute;
            box-shadow: none;
            top: 30vh;
            left: 50%;
            background-color: #FFFFFF;
        }
        table td {
            text-align: center;
        }
        table td:nth-child(3),
        table td:nth-child(4) {
            text-align: start;
        }


    </style>

    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-header">
    @if(session() -> has('successMessage'))
    <div class="px-2 pt-2">
        <div class="alert alert-info" role="alert">
            {{ session('successMessage') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>
    @endif
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Baca Meter Mandiri</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12 d-relative">
            <div class="card">
                <div class="card-body table-responsive p-3" style="min-height: 50vh;">
                    <table id="myTable" class="w-100 table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Rekening</th>
                            <th class="text-center">Pelanggan</th>
                            <th class="text-center">Bulan</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Angka Final</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" id="tableContent">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function () {
              var table = $('#myTable').DataTable({
                  processing: true,
                  serverSide: true,
                    language : {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'},
                  ajax: "{{ route('baca-meter-mandiri') }}",
                  columns: [
                      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'no_rekening', name: 'no_rekening'},
                      {data: 'pelanggan', name: 'pelanggan'},
                      {data: 'bulan', name: 'bulan'},
                      {data: 'tahun', name: 'tahun'},
                      {data: 'final', name: 'final'},
                      {data: 'status', name: 'status'},
                      {data: 'aksi', name: 'aksi'},
                  ]
            });
        });
    </script>
@endsection
