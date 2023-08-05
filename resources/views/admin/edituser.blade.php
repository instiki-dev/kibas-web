
@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/tambahadmin.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 pt-4 pl-4">
        <h2 class="mt-4 ml-2">Ubah Password</h2>
        <form class="px-4 pt-3" action="{{ route('ubah-password', ['user' => $user -> id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group col-md-8">
              <label for="inputPassword">Password</label>
              <input name="password" type="password" class="form-control" id="inputArea" placeholder="Password">
            </div>
            <div class="form-group col-md-8">
              <label for="inputKecamatan">Konfirmasi Password</label>
              <input name="password2" type="password" class="form-control" id="inputKonfirmasiPassword" placeholder="Konfirmasi Password">
            </div>
            @if($errors -> first())
            <div class="alert alert-danger px-3" role="alert">
                {{ $errors -> first() }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          <button onclick="return confirm('Yakin ingin merubah password')" type="submit" class="btn btn-primary ml-4 mt-2" style="border: none;">Ubah</button>
        </form>
        <a href="{{ route('user') }}" class="btn-nav"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
    </div>
@endsection
