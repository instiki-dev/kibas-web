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
                        <button id="btnFile" type="button" class="btn btn-primary" style="color: #fff;">Import Tagihan</button>
                    </form>
                    <div class="card-tools">
                        <div class="input-group input-group-sm"  style="width: 400px;">
                            <input id="inputSearch" class="form-control float-right" type="text" placeholder="Search">
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0" style="height: 60vh;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">No Rekening</th>
                            <th class="text-center">Pelanggan</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody class="text-center" id="tableContent">
                            @foreach($data as $item)
                            <tr>
                              <td scope="col">{{ $loop -> index + 1}}</td>
                              <td scope="col">{{ $item -> no_rekening }}</td>
                              <td scope="col">{{ $item -> pelanggan -> nama_pelanggan }}</td>
                            <td scope="col">
                                <div class="wrapper d-inline">
                                    <a href="{{ route('show-update-rekening', ['rekening' => $item -> id]) }}" type="button" class="btn btn-outline-success mr-3">Edit</a>
                                    <a href="{{ route('show-detail-rekening', ['rekening' => $item -> id]) }}" type="button" class="btn btn-outline-info mr-3">Detail</a>
                                    <a onclick="return confirm('Yakin ingin menghapus data')" href="{{ route('hapus-rekening', ['rekening' => $item -> id]) }}" type="button" class="btn btn-outline-danger">Hapus</a>
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
