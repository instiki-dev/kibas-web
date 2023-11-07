@extends('adminlte.main')

@section('style')
    <style>
        #myTable_processing {
            position: absolute;
            box-shadow: none;
            top: 200%;
            left: 50%;
            background-color: #FFFFFF;
        }
    </style>
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
                <h1 class="m-0">Pengaduan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Daftar Pengaduan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">

                <div class="card-body table-responsive py-0 px-3" style="height: 60vh;">
                    <table id="myTable" class="w-100 table table-head-fixed text-nowrap">
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">Rekening</th>
                            <th class="text-center">Waktu Lapor</th>
                            <th class="text-center">Petugas</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
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
                  ajax: "{{ route('pengaduan') }}",
                  columns: [
                      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'rekening_id', name: 'rekening_id'},
                      {data: 'created_at', name: 'created_at'},
                      {data: 'petugas_id', name: 'petugas_id'},
                      {data: 'status', name: 'status'},
                      {data: 'nilai', name: 'nilai'},
                      {data: 'aksi', name: 'aksi'},
                  ]
              });        });
    </script>
@endsection
