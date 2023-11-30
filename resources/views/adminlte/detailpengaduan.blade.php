@extends('adminlte.main')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Pengaduan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pengaduan') }}" class="btn btn-outline-secondary">Kembali <i class="fa fa-arrow-left" aria-hidden="true"></i>
</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilih Petugas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card">
                <div class="card-body table-responsive p-2" style="height: 70%;">
                    <table class="table table-bordered table-striped" id="data-tabel">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Area</th>
                                <th class="text-center">Jumlah Penugasan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" id="tableContent">
                            @foreach($pegawai as $item)
                            <tr>
                              <td scope="col">{{ $loop -> index + 1}}</td>
                              <td scope="col">{{ $item -> nama }}</td>
                              <td scope="col">{{ $item -> area ? $item -> area -> area : "-" }}</td>
                              <td scope="col">{{ $item -> penugasan -> jumlah }}</td>
                                <td scope="col">
                                    <div class="wrapper d-inline">
                                        @if (!$item -> user -> can('admin-page-access'))
                                            <form action="{{ route('admin-konfirmasi', ['pengaduan' => $pengaduan-> id]) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input name="petugas_id" value="{{ $item -> id }}" type="hidden">
                                                <button onclick="return confirm('Yakin ingin memilih petugas ini?')" type="submit" class="btn btn-outline-success mr-3">Pilih</button>
                                            </form>
                                        @endif
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
    </div>
    <div class="container-fluid">
        <div class="col-12">
           <div class="card mb-2">
              <img class="card-img-top" src="{{ $pengaduan -> link_foto }}" alt="Card image cap">
              <div class="card-body px-3 d-flex justify-content-between">
                    <div class="card-content">
                        <h2>{{ $pengaduan -> pelanggan ? $pengaduan -> pelanggan -> nama_pelanggan : '-' }}</h3>
                        <h3>{{ $pengaduan -> rekening ? $pengaduan -> rekening -> no_rekening : '-' }}</h4>
                        <h5 class="description">{{ $pengaduan -> keluhan }}</h5>

                        <h6>Nomor Telepon : {{ $pengaduan -> pelanggan ? $pengaduan -> pelanggan -> no_pelanggan : '-' }}</h6>
                        <h6>Kecamatan : {{ $pengaduan -> rekening -> kecamatan ? $pengaduan -> rekening -> kecamatan -> kecamatan : '-' }}</h6>
                        <h6>Kelurahan : {{ $pengaduan -> rekening -> kelurahan ? $pengaduan -> rekening -> kelurahan -> kelurahan : '-' }}</h6>
                        @if(!$pengaduan -> petugas)
                        <div class="action">
                            <button type="button" class="btn btn-danger ml-3 mt-3" data-toggle="modal" data-target="#exampleModal">
                                Pilih Petugas
                            </button>
                        </div>
                        @endif
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
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
