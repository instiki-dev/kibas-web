@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/detailpengaduan.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 py-3 pl-3">
        <h2 class="mt-4 ml-2">Detail Pengaduan</h2>
        <div id="keterangan" class="d-flex justify-content-center align-items-center mt-5 pt-2 pl-4 ml-5">
            <img id="bukti" src="{{ $pengaduan -> link_foto }}">
            <div class="container px-5 ">
                <div class="top-profile mb-3">
                    <h3>{{ $pengaduan -> pelanggan ? $pengaduan -> pelanggan -> nama_pelanggan : '-' }}</h1>
                    <h4>{{ $pengaduan -> rekening ? $pengaduan -> rekening -> no_rekening : '-' }}</h4>
                    <h4 class="description">{{ $pengaduan -> keluhan }}</h4>
                    @if($pengaduan -> nilai)
                        <h4>
                            @for($i = 0; $i < $pengaduan -> nilai; $i++)
                                <ion-icon name="star-outline"></ion-icon>
                            @endfor
                        </h4>
                    @endif
                </div>

                <div class="w-100 px-3 py-2 bottom-profile">
                    <h5>Nomor Telepon : {{ $pengaduan -> pelanggan ? $pengaduan -> pelanggan -> no_pelanggan : '-' }}</h4>
                    <h5>Kecamatan : {{ $pengaduan -> rekening -> kecamatan ? $pengaduan -> rekening -> kecamatan -> kecamatan : '-' }}</h4>
                    <h5>Kelurahan : {{ $pengaduan -> rekening -> kelurahan ? $pengaduan -> rekening -> kelurahan -> kelurahan : '-' }}</h4>
                    <h5>Petugas : {{ $pengaduan -> petugas ? $pengaduan -> petugas -> nama : '-' }}</h4>
                    <h5>Tgl Selesai : {{ $pengaduan -> tgl_selesai ? $pengaduan -> tgl_selesai : '-' }}</h4>
                </div>
            </div>
        </div>
        <a href="{{ route('show-riwayat', ['rekening' => $rekening-> id]) }}" class="btn-nav mt-3 mb-3"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
    </div>
@endsection

@section('script')
    <script src="/js/fullsize.js"></script>
    <script>
        var keterangan = document.querySelector("#keterangan")
        var img = keterangan.querySelector("img")
        console.log()

        if (window.innerWidth < 600) {
            keterangan.classList.add("flex-column")
            keterangan.classList.remove("ml-5")
            keterangan.classList.remove("mt-5")
            keterangan.classList.remove("pl-4")
            img.classList.add("w-100")
            img.classList.add("mb-2")
        }
    </script>
@endsection
