@extends('adminlte.main')

<<<<<<< Updated upstream
=======
@section('style')
    <style>
        #myTable_processing {
            position: absolute;
            box-shadow: none;
            top: 30vh;
            left: 50%;
            background-color: #FFFFFF;
        }
    </style>
@endsection

>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm"  style="width: 250px;">
                            <input id="inputSearch" class="form-control float-right" type="text" placeholder="Search">
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0" style="height: 60vh;">
                    <table class="table table-head-fixed text-nowrap">
=======
                <div class="form-group">
                    <select id="status" class="form-control" style="width: 30vw;">
                        <option value="0" selected>Filter Status</option>
                        <option value="Belum">Belum Dikonfirmasi</option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Diproses">Diproses</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
                <div class="card-body table-responsive py-0 px-3" style="height: 60vh;">
                    <table id="myTable" class="w-100 table table-head-fixed text-nowrap">
>>>>>>> Stashed changes
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">Rekening</th>
                            <th class="text-center">Waktu Lapor</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody class="text-center" id="tableContent">
                            @foreach($data as $item)
                            <tr>
                                  <th scope="col">{{ $loop -> index + 1}}</th>
                                  <th scope="col">{{ $item -> rekening -> no_rekening }}</th>
                                  <th scope="col">{{ $item -> created_at }}</th>
                                    <th scope="col">
                                        <div class="wrapper d-inline">
                                            <a href="{{ route('show-detail-pengaduan', ['pengaduan' => $item -> id]) }}" type="button" class="btn btn-outline-info mr-3">Detail</a>
                                        </div>
                                    </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<<<<<<< Updated upstream
    <script src="/js/SearchPengaduan.js"></script>
=======
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
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
                    },
                    ajax: {
                        url : "{{ route('pengaduan') }}",
                        data : function (d) {
                            d.status = $('#status').val()
                        }
                    },
                  columns: [
                      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'rekening_id', name: 'rekening_id'},
                      {data: 'created_at', name: 'created_at'},
                      {data: 'petugas_id', name: 'petugas_id'},
                      {data: 'status', name: 'status'},
                      {data: 'nilai', name: 'nilai'},
                      {data: 'aksi', name: 'aksi'},
                  ]
            });
            $('#status').change(function(){
                console.log($(this).val())
                table.column('status')
                .search($(this).val())
                .draw();
            });
        });
    </script>
>>>>>>> Stashed changes
@endsection
