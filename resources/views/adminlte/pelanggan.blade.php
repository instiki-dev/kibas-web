@extends('adminlte.main')

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
                <h1 class="m-0">Pelanggan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('show-tambah-pelanggan') }}">Tambah Pelanggan</a></li>
                    <li class="breadcrumb-item active">Daftar Pelanggan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
        <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm"  style="width: 250px;">
                            <input id="inputSearch" class="form-control float-right" type="text" placeholder="Search">
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0" style="height: 60vh;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody class="text-center" id="tableContent">
                            @foreach($data as $item)
                            <tr>
                                  <th scope="col">{{ $loop -> index + 1}}</th>
                                  <th scope="col">{{ $item -> nama_pelanggan }}</th>
                                  <th scope="col">{{ $item -> nik_pelanggan }}</th>
                                <th scope="col">
                                    <div class="wrapper d-inline">
                                        <a href="{{ route('show-edit-pelanggan', ['pelanggan' => $item -> id]) }}" type="button" class="btn btn-outline-success mr-3">Edit</a>
                                        <a href="{{ route('show-detail-pelanggan', ['pelanggan' => $item -> id]) }}" type="button" class="btn btn-outline-info mr-3">Detail</a>
                                        <a onclick="return confirm('Yakin ingin menghapus data')" href="{{ route('hapus-pelanggan', ['pelanggan' => $item -> id]) }}" type="button" class="btn btn-outline-danger">Hapus</a>
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
    <script src="/js/SearchPelanggan.js"></script>
@endsection
