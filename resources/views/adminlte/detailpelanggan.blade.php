@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Pelanggan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pelanggan') }}">Kembali</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        {{ $pelanggan -> nama_pelanggan }}
                    </h3>
                </div>
                <div class="card-body table-responsive px-3" style="height: 60vh;">
                    <h5>No Pelanggan : {{ $pelanggan -> no_pelanggan }}</h5>
                    <h5>Alamat Pelanggan : {{ $pelanggan -> alamat_pelanggan }}</h5>
                    <h5>Kecamatan : {{ $pelanggan -> kecamatan ?  $pelanggan -> kecamatan -> kecamatan : '-'}}</h5>
                    <h5>Kelurahan : {{ $pelanggan -> kelurahan ? $pelanggan -> kelurahan -> kelurahan : '-'}}</h5>
                    <h5>Golongan : {{ $pelanggan -> golongan ? $pelanggan -> golongan -> golongan : '-'}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
