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
                <h1 class="m-0">Daftar Tagihan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('show-tambah-tagihan', ['rekening' => $rekening -> no_rekening]) }}">Tambah Tagihan</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('show-detail-rekening', ['rekening' => $rekening -> id]) }}">Kembali</a></li>
                    <li class="breadcrumb-item active">Daftar Tagihan</li>
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
                            <option value="1">Lunas</option>
                            <option value="2">Belum Lunas</option>
                          </select>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0" style="height: 60vh;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">No Tagihan</th>
                            <th class="text-center">Nominal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody class="text-center" id="tableContent">
                            @foreach($data as $item)
                            <tr>
                              <td scope="col">{{ $loop -> index + 1}}</td>
                              <td scope="col">{{ $item -> no_tagihan }}</td>
                              <td scope="col">{{ $item -> nominal }}</td>
                                <td scope="col">
                                    @if($item -> status == 1)
                                        <div class="alert a-3" role="alert">
                                            Belum Lunas
                                        </div>
                                    @else
                                        <div class="alert a-4" role="alert">
                                          Lunas
                                        </div>
                                    @endif
                                </td>
                                <td scope="col">
                                    <div class="wrapper d-inline">
                                        <a href="{{ route('show-detail-tagihan', ['tagihan' => $item -> no_tagihan]) }}" type="button" class="btn btn-outline-info mr-3">Detail Tagihan</a>
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
