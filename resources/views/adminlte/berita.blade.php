@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Berita</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pengumuman') }}">Kembali</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive py-3 px-5" style="height: 120vh;">
                    <h1>{{ $berita -> judul }}</h1>
                    <div class="pt-3">
                        <h6>Ditulis oleh {{ $berita -> penulis }}</h6>
                        <h6>Diterbitkan pada {{ $berita -> created_at }}</h6>
                    </div>
                    <img class="card-img-top" src="{{ $berita -> link_foto }}"/>
                    <div class="pt-3 pb-5">
                        {!! $berita -> pengumuman !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
