@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Kecamatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('kecamatan') }}">Kembali</a></li>
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
                    <form class="px-4 pt-3" action="{{ route('edit-kecamatan', ['kecamatan' => $kecamatan -> id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-10">
                          <label for="inputKecamatan">Nama Kecamatan</label>
                          <input value="{{ $kecamatan -> kecamatan }}" name="kecamatan" type="text" class="form-control" id="inputKecamatan" placeholder="Nama Kecamatan">
                        </div>
                        @if($errors -> first())
                        <div class="alert alert-danger px-3" role="alert">
                            {{ $errors -> first() }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                      <button onclick="return confirm('Yakin ingin merubah data')" type="submit" class="btn btn-danger ml-4 mt-2" style="border: none;">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
