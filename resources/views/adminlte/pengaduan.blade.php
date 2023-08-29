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
                            <th class="text-center">Rekening</th>
                            <th class="text-center">Waktu Lapor</th>
                            <th class="text-center">Petugas</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody class="text-center" id="tableContent">
                            @foreach($data as $item)
                            <tr>
                                  <td scope="col">{{ $loop -> index + 1}}</td>
                                  <td scope="col">{{ $item -> rekening -> no_rekening }}</td>
                                  <td scope="col">{{ $item -> created_at }}</td>
                                  <td scope="col">{{ $item -> petugas ? $item -> petugas -> nama : "-"}}</td>
                                    @if($item -> status == 1)
                                      <td scope="col"><span class="badge badge-secondary">Belum Dikonfirmasi Admin</span></td>
                                    @elseif($item -> status == 2)
                                      <td scope="col"><span class="badge badge-warning">Menunggu</span></td>
                                    @elseif($item -> status == 3)
                                      <td scope="col"><span class="badge badge-primary">Proses</span></td>
                                    @elseif($item -> status == 4)
                                      <td scope="col"><span class="badge badge-success">Selesai</span></td>
                                    @endif
                                    <td scope="col">
                                        <div class="wrapper d-inline">
                                            <a href="{{ route('show-detail-pengaduan', ['pengaduan' => $item -> id]) }}" type="button" class="btn btn-outline-info mr-3">Detail</a>
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
    <script src="/js/SearchPengaduan.js"></script>
@endsection
