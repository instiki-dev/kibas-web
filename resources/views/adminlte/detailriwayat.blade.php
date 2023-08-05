@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Pengaduan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('show-riwayat', ['rekening' => $rekening -> id]) }}">Kembali</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
           <div class="card mb-2">
              <img class="card-img-top" src="{{ $pengaduan -> link_foto }}" alt="Card image cap">
              <div class="card-body px-3 d-flex justify-content-between">
                    <div class="card-content">
                        <h2>{{ $pengaduan -> pelanggan ? $pengaduan -> pelanggan -> nama_pelanggan : '-' }}</h3>
                        <h3>{{ $pengaduan -> rekening ? $pengaduan -> rekening -> no_rekening : '-' }}</h4>
                        @if($pengaduan -> nilai)
                            <h4>
                                @for($i = 0; $i < $pengaduan -> nilai; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </h4>
                        @endif
                        <h5 class="description">{{ $pengaduan -> keluhan }}</h5>

                        <h6>Nomor Telepon : {{ $pengaduan -> pelanggan ? $pengaduan -> pelanggan -> no_pelanggan : '-' }}</h6>
                        <h6>Kecamatan : {{ $pengaduan -> rekening -> kecamatan ? $pengaduan -> rekening -> kecamatan -> kecamatan : '-' }}</h6>
                        <h6>Kelurahan : {{ $pengaduan -> rekening -> kelurahan ? $pengaduan -> rekening -> kelurahan -> kelurahan : '-' }}</h6>
                        <h6>Petugas : {{ $pengaduan -> petugas ? $pengaduan -> petugas -> nama : '-' }}</h6>
                        <h6>Tgl Selesai : {{ $pengaduan -> tgl_selesai ? $pengaduan -> tgl_selesai : '-' }}</h6>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
