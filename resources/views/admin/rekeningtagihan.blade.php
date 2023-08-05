@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/golongan.css">
    <style>
        .alert.a-3 {
            background-color : #80ccff;
            color: #004d80;
        }
        .alert.a-4 {
            background-color : #9fff80;
            color: #134d00;
        }
    </style>
@endsection

@section('content')
<div class="parent w-100 h-100 py-3 pl-3">
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
    <h2 class="ml-5 mt-4 mb-3">Daftar Tagihan</h2>
    <div class="pr-5">
        <div class="d-flex widget w-100 justify-content-end pr-5">
            <select class="custom-select w-25 mr-3" id="inputGroupSelect01">
                <option value="0" selected>Semua</option>
                <option value="1">Lunas</option>
                <option value="2">Belum Lunas</option>
              </select>
            <a href="{{ route('show-tambah-tagihan', ['rekening' => $rekening -> no_rekening]) }}" class="add btn mr-3" style="color: #fff;">Tambah Tagihan</a>
            <a href="{{ route('show-detail-rekening', ['rekening' => $rekening -> id]) }}" class="btn btn-info">Kembali</a>
        </div>
    </div>
    <div class="child w-100 h-75 px-5 py-2 mt-4">
        <div class="pl-4 pr-5 mt-2">
            <table class="table table-sm table-info">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">No Tagihan</th>
                      <th scope="col">Nominal</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                    </tr>
              </thead>
                <tbody id="tableContent">
                    @foreach($data as $item)
                        <tr>
                          <th scope="col">{{ $loop -> index + 1}}</th>
                          <th scope="col">{{ $item -> no_tagihan }}</th>
                          <th scope="col">{{ $item -> nominal }}</th>
                        <th scope="col">
                            @if($item -> status == 1)
                                <div class="alert a-3" role="alert">
                                    Belum Lunas
                                </div>
                            @else
                                <div class="alert a-4" role="alert">
                                  Lunas
                                </div>
                            @endif
                        </th>
                        <th scope="col">
                            <div class="wrapper d-inline">
                                <a href="{{ route('show-detail-tagihan', ['tagihan' => $item -> no_tagihan]) }}" type="button" class="btn btn-outline-info mr-3">Detail Tagihan</a>
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
    <!-- <script src="/js/SearchPengaduan.js"></script> -->
    <script src="/js/riwayat.js"></script>
    <script>
        const filter = document.querySelector("select");
        const table = document.querySelector("#tableContent");
        const noRek = {{ $item -> rekening -> no_rekening }}

        filter.addEventListener("change", function() {
            const xhr = new XMLHttpRequest()
            xhr.onload = function() {
                if(xhr.readyState === 4 && xhr.status === 200) {
                    table.innerHTML = xhr.responseText;
                }
            }
            xhr.open("GET", `/admin/rekening/tagihan/${noRek}/filter-tagihan?filter='${this.value}'`);
            xhr.send()
        })
        var select = document.querySelector("select")
        if (window.innerWidth < 600) {
            select.classList.remove("w-25")
            select.classList.add("w-75")
        }
    </script>
@endsection
