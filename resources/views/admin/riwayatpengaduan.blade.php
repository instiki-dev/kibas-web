@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/golongan.css">
    <style>
        .alert.a-1 {
            background-color : #e6f2ff;
            color: #111;
        }
        .alert.a-2 {
            background-color : #ffff99;
            color: #808000;
        }
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
    <h2 class="ml-5 mt-4 mb-3">Riwayat Pengaduan</h2>
    <div class="pr-5">
        <div class="d-flex widget riwayat w-100 justify-content-end pr-5">
             <select class="custom-select w-25 mr-3" id="inputGroupSelect01">
                <option value="0" selected>Semua</option>
                <option value="1">Hari ini</option>
                <option value="2">Minggu ini</option>
                <option value="3">Bulan ini</option>
              </select>
            <a href="{{ route('show-detail-rekening', ['rekening' => $rekening -> id]) }}" class="btn btn-info">Kembali</a>
        </div>
    </div>
    <div class="child w-100 h-75 px-5 py-2 mt-4">
        <div class="pl-4 pr-5 mt-3">
            <table class="table table-sm table-info">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Rekening</th>
                      <th scope="col">Waktu</th>
                      <th scope="col">ID Pengaduan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                    </tr>
              </thead>
                <tbody id="tableContent">
                    @foreach($data as $item)
                        <tr>
                          <th scope="col">{{ $loop -> index + 1}}</th>
                          <th scope="col">{{ $item -> pengaduan -> rekening -> no_rekening }}</th>
                          <th scope="col">{{ $item -> created_at }}</th>
                          <th scope="col">{{ $item -> pengaduan_id }}</th>
                        <th scope="col">
                            @if($item -> status == 1)
                                <div class="alert a-1" role="alert">
                                    Belum Dikonfirmasi
                                </div>
                            @elseif($item -> status == 2)
                                <div class="alert a-2" role="alert">
                                    Menunggu
                                </div>
                            @elseif($item -> status == 3)
                                <div class="alert a-3" role="alert">
                                    Diproses
                                </div>
                            @else
                                <div class="alert a-4" role="alert">
                                   Selesai
                                </div>
                            @endif
                        </th>
                        <th scope="col">
                            <div class="wrapper d-inline">
                                <a href="{{ route('show-detail-riwayat', ['riwayat' => $item -> id]) }}" type="button" class="btn btn-outline-info mr-3">Detail Pengaduan</a>
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
        const noRek = {{ $rekening -> no_rekening }}

        filter.addEventListener("change", function() {
            const xhr = new XMLHttpRequest()
            xhr.onload = function() {
                if(xhr.readyState === 4 && xhr.status === 200) {
                    table.innerHTML = xhr.responseText;
                }
            }
            xhr.open("GET", `/admin/rekening/riwayat-pengaduan/${noRek}/filter-riwayat?filter='${this.value}'`);
            xhr.send()
        })

        var select = document.querySelector("select")
        if (window.innerWidth < 600) {
            select.classList.remove("w-25")
            select.classList.add("w-75")
        }
    </script>
@endsection
