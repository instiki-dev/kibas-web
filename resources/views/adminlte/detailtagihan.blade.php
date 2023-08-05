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
                    <li class="breadcrumb-item"><a href="{{ route('show-tagihan', ['rekening' => $tagihan -> rekening -> no_rekening]) }}">Kembali</a></li>
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
                <h3>{{ $tagihan -> no_tagihan }}</h1>
                <h4>Rp. {{ $tagihan -> nominal}}</h4>
                <p class="card-text mb-0">Periode : {{ $bulan }} {{ $tagihan -> tahun }}</p>
                <p class="card-text mb-0">Jatuh Tempo : {{ $tagihan -> tgl_jatuh_tempo }}</p>
                <p class="card-text mb-0">Pembaca Meter : {{ $tagihan -> pembaca ? $tagihan -> pembaca -> nama : "-" }}</p>
                <p class="card-text mb-0">Kilometer : {{ $tagihan -> kilometer }}</p>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
