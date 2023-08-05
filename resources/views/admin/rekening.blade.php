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
    <h2 class="ml-5 mt-4 mb-3">Daftar Rekening</h2>
    <div class="pr-5">
        <div class="d-flex widget w-100 justify-content-end pr-5">
            <input id="inputSearch" class="mr-3 pl-3 py-1 w-25" type="text" placeholder="Cari...">
            <a href="{{ route('show-tambah-rekening') }}" class="add btn mr-3" style="color: #fff;">Tambah Rekening</a>
            <form id="tagihanForm" action="{{ route('import-tagihan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input id="inputFile" name="file" type="file" hidden>
                <button id="btnFile" type="button" class="add btn mr-3" style="color: #fff;">Import Tagihan</button>
            </form>
        </div>
    </div>
    <div class="child w-100 px-5 py-2">
        <div class="pl-4 pr-5 mt-3">
            <table class="table table-sm table-info">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">No Rekening</th>
                      <th scope="col">Pelanggan</th>
                      <th scope="col">Aksi</th>
                    </tr>
              </thead>
                <tbody id="tableContent">
                    @foreach($data as $item)
                        <tr>
                          <th scope="col">{{ $loop -> index + 1}}</th>
                          <th scope="col">{{ $item -> no_rekening }}</th>
                          <th scope="col">{{ $item -> pelanggan -> nama_pelanggan }}</th>
                        <th scope="col">
                            <div class="wrapper d-inline">
                                <a href="{{ route('show-update-rekening', ['rekening' => $item -> id]) }}" type="button" class="btn btn-outline-success mr-3">Edit</a>
                                <a href="{{ route('show-detail-rekening', ['rekening' => $item -> id]) }}" type="button" class="btn btn-outline-info mr-3">Detail</a>
                                <a onclick="return confirm('Yakin ingin menghapus data')" href="{{ route('hapus-rekening', ['rekening' => $item -> id]) }}" type="button" class="btn btn-outline-danger">Hapus</a>
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
    <script src="/js/SearchRekening.js"></script>
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
@endsection
