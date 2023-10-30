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
                <h1 class="m-0">Baca Meter Mandiri</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="height: 66vh;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">Rekening</th>
                            <th class="text-center">Bulan</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Angka Final</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody class="text-center" id="tableContent">
                            @foreach($data as $item)
                            <tr>
                                  <td scope="col">{{ $loop -> index + 1}}</td>
                                  <td scope="col">{{ $item -> no_rekening }}</td>
                                  <td scope="col">{{ $item -> bulan }}</td>
                                  <td scope="col">{{ $item -> tahun }}</td>
                                  <td scope="col">{{ $item -> angka_final ? $item -> angka_final : "-"}}</td>
                                    @if($item -> verifikasi)
                                      <td scope="col"><span class="badge badge-success">Terverifikasi</span></td>
                                    @else
                                      <td scope="col"><span class="badge badge-info">Belum Terverifikasi</span></td>
                                    @endif
                                    @if(!$item -> angka_final)
                                    <td scope="col">
                                        <div class="wrapper d-inline">
                                            <a href="{{ route('show-tambah-angka', ['meter' => $item -> id]) }}" type="button" class="btn btn-outline-info mr-3">Konfirmasi Besaran Meter</a>
                                        </div>
                                    </td>
                                    @endif
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
@endsection
