@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/detailpelanggan.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 py-3 pl-3">
        <h2 class="mt-4 ml-2">Detail Rekening</h2>
        <div class="container px-5 mt-5">
            <div class="top-profile mb-3">
                <h3>{{ $rekening -> pelanggan -> nama_pelanggan }}</h1>
                <h4>{{ $rekening -> no_rekening }}</h4>
            </div>

            <div class="w-50 px-3 py-2 bottom-profile">
                <h5>Kecamatan : {{ $rekening -> kecamatan ? $rekening -> kecamatan -> kecamatan : "-" }}</h4>
                <h5>Kelurahan : {{ $rekening -> kelurahan ? $rekening -> kelurahan -> kelurahan : "-" }}</h4>
                <h5>Latitude : {{ $rekening -> lat }}</h4>
                <h5>Longtitude : {{ $rekening -> lng }}</h4>
                <div class="d-flex mt-4 mb-2 justify-content-center">
                    <a href="{{ route('show-riwayat', ['rekening' => $rekening-> id]) }}" class="btn btn-primary" style="color: #fff;">Riwayat Pengaduan</a>
                    <a href="{{ route('show-tagihan', ['rekening' => $rekening-> no_rekening]) }}" id="tagihan" class="btn btn-info ml-3" style="color: #fff;">Tagihan</a>
                </div>
            </div>
        </div>
        <a href="{{ route('rekening') }}" class="btn-nav mt-4 mb-3"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
    </div>
@endsection

@section('script')
    <script>
        var bottom = document.querySelector(".bottom-profile")
        var btn = bottom.querySelector(".d-flex")
        var tagihan = btn.querySelector("#tagihan")

        if (window.innerWidth < 600) {
            bottom.classList.remove("w-50");
            bottom.classList.add("w-100");
            btn.classList.add("flex-column")
            btn.classList.add("align-items-center")
            tagihan.classList.add("mt-2")
        }
    </script>
@endsection
