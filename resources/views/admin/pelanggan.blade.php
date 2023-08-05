@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/golongan.css">
@endsection

@section('content')
<div class="parent w-100 py-3 pl-3">
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
    <h2 class="ml-5 mt-4 mb-3">Daftar Pelanggan</h2>
    <div class="pr-5">
        <div class="d-flex w-100 widget justify-content-end pr-5">
            <input id="inputSearch" class="mr-3 pl-3 py-1 w-25" type="text" placeholder="Cari...">
            <a href="{{ route('show-tambah-pelanggan') }}" class="add btn" style="color: #fff;">Tambah Pelanggan</a>
        </div>
    </div>
    <div class="child w-100 px-5 py-2">
        <div class="pl-4 pr-5 mt-3">
            <table class="table table-sm table-info">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIK</th>
                      <th scope="col">Aksi</th>
                    </tr>
              </thead>
                <tbody id="tableContent">
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
@endsection

@section('script')
    <script src="/js/SearchPelanggan.js"></script>
    <script src="/js/child.js"></script>
@endsection
