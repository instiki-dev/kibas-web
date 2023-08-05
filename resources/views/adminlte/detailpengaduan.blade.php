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
                    <li class="breadcrumb-item"><a href="{{ route('pengaduan') }}">Kembali</a></li>
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
                        <h5 class="description">{{ $pengaduan -> keluhan }}</h5>

                        <h6>Nomor Telepon : {{ $pengaduan -> pelanggan ? $pengaduan -> pelanggan -> no_pelanggan : '-' }}</h6>
                        <h6>Kecamatan : {{ $pengaduan -> rekening -> kecamatan ? $pengaduan -> rekening -> kecamatan -> kecamatan : '-' }}</h6>
                        <h6>Kelurahan : {{ $pengaduan -> rekening -> kelurahan ? $pengaduan -> rekening -> kelurahan -> kelurahan : '-' }}</h6>
                    </div>
                    <div class="action">
                        <form class="mt-5 pt-2 ml-4 mr-3" action="{{ route('konfirmasi-pengaduan', ['pengaduan' => $pengaduan -> id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-md-12">
                              <label for="inputPetugas">Pilih Pegawai</label>
                                <select id="inputPetugas" name="petugas_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="0">Pilih Pegawai</option>
                                    @foreach ($pegawai as $item)
                                    <option data-tokens="data" value={{ $item -> id }}>{{ $item -> nama }}</option>
                                    @endforeach
                                    <!-- <option data-tokens="data" value="0">Lainnya</option> -->
                                </select>
                            </div>
                            @if($errors -> first())
                            <div class="alert alert-danger px-3" role="alert">
                                Pilih pegawai terlebih dahulu
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @endif
                          <button type="submit" class="btn btn-primary ml-4 mt-2 mb-3" style="border: none;">Konfirmasi Pengaduan</button>
                        </form>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
