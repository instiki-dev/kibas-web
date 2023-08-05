@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Survey</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Kembali</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                       Jawaban
                    </div>
                    <div class="card-body table-responsive p-0" style="height: 60vh;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">No Rekening</th>
                                <th class="text-center">Nilai</th>
                            </thead>
                            <tbody class="text-center" id="tableContent">
                                @foreach($data -> jawaban as $item)
                                <tr>
                                      <th scope="col">{{ $loop -> index + 1}}</th>
                                      <th scope="col">{{ $item -> pelanggan -> nama_pelanggan }}</th>
                                      <th scope="col">{{ $item -> rekening -> no_rekening }}</th>
                                    <th scope="col">
                                        <div class="d-inline">
                                            @for($i=0; $i < $item -> nilai; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            {{ $data -> pertanyaan }}
                        </h4>
                    </div>
                    <div class="card-body table-responsive p-0" style="height: 40vh;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <th class="text-center">No</th>
                                <th class="text-center">Detail Pertanyaan</th>
                                <th class="text-center">Bobot</th>
                            </thead>
                            <tbody class="text-center" id="tableContent">
                                @foreach($data -> detail as $item)
                                <tr>
                                      <th scope="col">{{ $loop -> index + 1}}</th>
                                      <th scope="col">{{ $item -> keterangan }}</th>
                                      <th scope="col">{{ $item -> bobot }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
