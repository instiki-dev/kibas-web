@extends('adminlte.main')

@section('style')
    <style>
        #myTable_processing {
            position: absolute;
            top: 15%;
            left: 50%;
            background-color: #DDDDDD;
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
                <h1 class="m-0">Rekening</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('show-tambah-rekening') }}">Tambah Rekening</a></li>
                    <li class="breadcrumb-item active">Daftar Rekening</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <form id="tagihanForm" action="{{ route('import-tagihan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input id="inputFile" name="file" type="file" hidden>
                        <button id="btnFile" type="button" class="btn btn-danger" style="color: #fff;">Import Tagihan</button>
                    </form>
                </div>
                <div class="px-3 py-0 card-body table-responsive p-0" style="height: 90vh;">
                    <table id="myTable" class="w-100 table table-head-fixed text-nowrap">
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">No Rekening</th>
                            <th class="text-center">Pelanggan</th>
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
                  ajax: "{{ route('rekening') }}",
                  columns: [
                      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'no_rekening', name: 'no_rekening'},
                      {data: 'pelanggan.nama_pelanggan', name: 'pelanggan.nama_pelanggan'},
                      {data: 'aksi', name: 'aksi'},
                  ]
              });        });
    </script>
@endsection