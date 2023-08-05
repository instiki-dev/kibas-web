@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/tambahadmin.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 pt-4 pl-4">
        <h2 class="mt-4 ml-2">Edit Kecamatan</h2>
        <form class="px-4 pt-3" action="{{ route('edit-kecamatan', ['kecamatan' => $kecamatan -> id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group col-md-8">
              <label for="inputNama">Nama Kecamatan</label>
              <input name="kecamatan" type="text" class="form-control" id="inputNama" value="{{ $kecamatan -> kecamatan }}" placeholder="Kelurahan">
            </div>
            @if($errors -> first())
            <div class="alert alert-danger px-3" role="alert">
                {{ $errors -> first() }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          <button onclick="return confirm('Yakin ingin merubah data')" type="submit" class="btn btn-primary ml-4 mt-2" style="border: none;">Edit</button>
        </form>
        <a href="{{ route('kecamatan') }}" class="btn-nav"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
    </div>
@endsection
