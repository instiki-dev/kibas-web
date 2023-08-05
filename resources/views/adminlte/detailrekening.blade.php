@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Rekening</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('rekening') }}">Kembali</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
             <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-body">
                <h3>{{ $rekening -> pelanggan -> nama_pelanggan }}</h3>
                <h4>{{ $rekening -> no_rekening }}</h4>
                <p class="card-text mb-0">Kecamatan : {{ $rekening -> kecamatan ? $rekening -> kecamatan -> kecamatan : "-" }}</p>
                <p class="card-text mb-0">Kelurahan : {{ $rekening -> kelurahan ? $rekening -> kelurahan -> kelurahan : "-" }}</p>
                <p class="card-text mb-0">Latitude : {{ $rekening -> latitude ? $rekening -> latitude : "-" }}</p>
                <p class="card-text mb-0">Longtitude : {{ $rekening -> longtitude ? $rekening -> longtitude : "-" }}</p>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('show-tagihan', ['rekening' => $rekening-> no_rekening]) }}" type="button" class="btn btn-success mr-2">Tagihan</a>
                        <a type="button" href="{{ route('show-riwayat', ['rekening' => $rekening-> id]) }}" class="btn btn-light">Riwayat Pengaduan</a>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
