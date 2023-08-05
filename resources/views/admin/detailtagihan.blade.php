@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/detailpelanggan.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 py-3 pl-3">
        <h2 class="mt-4 ml-2">Detail Tagihan</h2>
        <div class="container px-5 mt-5">
            <div class="top-profile mb-3">
                <h3>{{ $tagihan -> no_tagihan }}</h1>
                <h4>Rp. {{ $tagihan -> nominal}}</h4>
            </div>

            <div class="w-50 px-3 py-2 bottom-profile">
                <h5>Periode : {{ $bulan }} {{ $tagihan -> tahun }}</h4>
                <h5>Jatuh Tempo : {{ $tagihan -> tgl_jatuh_tempo }}</h4>
                <h5>Pembaca Meter : {{ $tagihan -> pembaca ? $tagihan -> pembaca -> nama : "-" }}</h4>
                <h5>Kilometer : {{ $tagihan -> kilometer }}</h4>
            </div>
        </div>
        <a href="{{ route('show-tagihan', ['rekening' => $tagihan -> rekening -> no_rekening]) }}" class="btn-nav mt-4 mb-3"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
    </div>
@endsection

@section('script')
    <script>
        var bottom = document.querySelector(".bottom-profile")

        if (window.innerWidth < 600) {
            bottom.classList.remove("w-50");
            bottom.classList.add("w-100");
        }
    </script>
@endsection

