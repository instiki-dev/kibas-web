@extends('adminlte.main')

@section('style')
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
                <h1 class="m-0">Daftar Area</h1>
            </div>
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Daftar Area</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('show-tambah-area') }}" class="btn btn-danger" style="color: #fff;">
                        Tambah Area <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped" id="data-tabel">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Area</th>
                                <th class="text-center">Kecamatan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" id="tableContent">
                            @foreach($data as $item)
                            <tr>
                                    <td class="text-center" scope="col">{{ $loop -> index + 1}}</td>
                                    <td style="text-align: start;" scope="col">{{ $item -> area }}</td>
                                    <td style="text-align: start;" scope="col">{{ $item -> kecamatan ? $item -> kecamatan -> kecamatan : "-" }}</td>
                                <td class="text-center" scope="col">
                                    <div class="wrapper d-inline">
                                        <a href="{{ route('show-edit-area', ['area' => $item -> id]) }}" type="button" class="btn btn-outline-success mr-3">Edit <i class="fa fa-pen" aria-hidden="true"></i></a>
                                        <a onclick="return confirm('Yakin ingin menghapus data')" href="{{ route('hapus-area', ['area' => $item -> id]) }}" type="button" class="btn btn-outline-danger">Hapus <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </td>
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
    <script src="/js/SearchArea.js"></script>

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
    </script>
@endsection
