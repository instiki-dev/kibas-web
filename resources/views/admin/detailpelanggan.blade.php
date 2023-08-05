@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/detailpelanggan.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 py-3 pl-3">
        <h2 class="mt-4 ml-2">Detail Pelanggan</h2>
        <div class="container px-5 mt-5">
            <div class="top-profile mb-3">
                <h3>{{ $pelanggan -> nama_pelanggan }}</h1>
                <h4>{{ $pelanggan -> nik_pelanggan }}</h4>
            </div>

            <div class="w-50 px-3 py-2 bottom-profile">
                <h5>No Pelanggan : {{ $pelanggan -> no_pelanggan }}</h4>
                <h5>Alamat Pelanggan : {{ $pelanggan -> alamat_pelanggan }}</h4>
                <h5>Kecamatan : {{ $pelanggan -> kecamatan ?  $pelanggan -> kecamatan -> kecamatan : '-'}}</h4>
                <h5>Kelurahan : {{ $pelanggan -> kelurahan ? $pelanggan -> kelurahan -> kelurahan : '-'}}</h4>
                <h5>Golongan : {{ $pelanggan -> golongan ? $pelanggan -> golongan -> golongan : '-'}}</h4>
            </div>
        </div>
        <a href="{{ route('pelanggan') }}" class="btn-nav mt-4 mb-3"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
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

