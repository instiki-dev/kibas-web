@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="btn btn-outline-secondary" href="{{ route('pegawai') }}">Kembali <i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="px-4 pt-3" action="{{ route('update-pegawai', ['pegawai' => $pegawai -> id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-8">
                          <label for="inputNama">Nama Lengkap</label>
                          <input value="{{ $pegawai -> nama }}" name="fullname" type="text" class="form-control" id="inputNama" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Email</label>
                          <input value="{{ $pegawai -> user -> email }}" name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        @if($errors -> first())
                        <div class="alert alert-danger px-3" role="alert">
                            {{ $errors -> first() }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                      <button onclick="return confirm('Yakin ingin merubah data?')" type="submit" class="btn btn-danger ml-4 mt-2" style="border: none;">Perbaharui <i class="fa fa-check" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
