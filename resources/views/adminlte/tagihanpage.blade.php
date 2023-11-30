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
        table td:nth-child(3) {
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
                <h1 class="m-0">Daftar Tagihan</h1>
            </div>
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Daftar Tagihan</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="tambah-wrapper d-flex">
                    <form id="tagihanForm" action="{{ route('import-tagihan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input id="inputFile" name="file" type="file" hidden>
                        <button id="btnFile" type="button" class="btn btn-secondary" style="color: #fff;">Import Tagihan <i class="fa fa-download" aria-hidden="true"></i></button>
                    </form>
                    <a class="btn btn-danger ml-3" href="{{ route('tambah-tagihan-page') }}" style="color: #fff;">
                        Tambah Tagihan <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
                <a class="btn btn-success ml-3" style="color: #fff;">
                    Sinkronkan <i class="fa fa-cloud" aria-hidden="true"></i>
                </a>
            </div>
            <div class="card-body table-responsive p-3" style="min-height: 50vh;">
                <table id="myTable" class="w-100 table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Rekening</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Nominal</th>
                            <th class="text-center">Jatuh Tempo</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        const btnFile = document.querySelector("#btnFile")
        const inputFile = document.querySelector("#inputFile")
        const formTagihan = document.querySelector("#tagihanForm")

        btnFile.addEventListener("click", function() {
            inputFile.click()
        })

        inputFile.addEventListener("input", function() {
            const result = confirm(`Yakin ingin membuat tagihan dari file ${this.value}?`);
            if (result) {
                formTagihan.submit()
            }
        })
    </script>
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
                  ajax: "{{ route('tagihan') }}",
                  columns: [
                      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'rekening_id', name: 'rekening_id'},
                      {data: 'pelanggan_id', name: 'pelanggan_id'},
                      {data: 'nominal', name: 'nominal'},
                      {data: 'tgl_jatuh_tempo', name: 'tgl_jatuh_tempo'},
                      {data: 'status', name: 'status'},
                      {data: 'aksi', name: 'aksi'},
                  ]
            });
        });
    </script>
@endsection
