@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Pengaduan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('baca-meter-mandiri') }}">Kembali</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
           <div class="card mb-2">
              <img class="card-img-top" src="{{ $data -> link_foto }}" alt="Card image cap">
              <div class="card-body px-3 d-flex justify-content-between">
                <form class="px-4 pt-3" action="{{ route('tambah-angka-meter', ['meter' => $data -> id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-10">
                      <label for="inputAngka">Angka</label>
                      <input name="angka" type="number" class="form-control" id="inputAngka" placeholder="Angka" value="{{ $data -> angka }}" disabled>
                    </div>
                    <div class="form-group col-md-10">
                      <label for="inputAngka">Angka Final</label>
                      <input name="angka_final" type="number" class="form-control" id="inputAngka" placeholder="Angka">
                    </div>
                    @if($errors -> first())
                    <div class="alert alert-danger px-3" role="alert">
                        {{ $errors -> first() }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                  <button onclick="return confirm('Yakin ingin mengkonfirmasi angka meter?')" type="submit" class="btn btn-danger ml-4 mt-2" style="border: none;">Konfirmasi</button>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
