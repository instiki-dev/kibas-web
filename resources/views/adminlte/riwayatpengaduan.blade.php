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
                <h1 class="m-0">Riwayat Pengaduan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('show-detail-rekening', ['rekening' => $rekening -> id]) }}">Kembali</a></li>
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
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm"  style="width: 250px;">
                        <select class="custom-select w-25 mr-3" id="inputGroupSelect01">
                            <option value="0" selected>Semua</option>
                            <option value="1">Hari ini</option>
                            <option value="2">Minggu ini</option>
                            <option value="3">Bulan ini</option>
                          </select>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0" style="height: 60vh;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">Rekening</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">ID Pengaduan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody class="text-center" id="tableContent">
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
    </div>
</div>
@endsection

@section('script')
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
