@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/tambahadmin.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 pt-4 pl-4">
        <h2 class="mt-4 ml-2">Tambah Admin</h2>
        <form class="px-4 pt-3" action="{{ route('tambah-admin') }}" method="post">
            @csrf
            <div class="form-group col-md-8">
              <label for="inputNama">Nama Lengkap</label>
              <input name="fullname" type="text" class="form-control" id="inputNama" placeholder="Nama Lengkap">
            </div>
        <div class="form-row px-3">
                <div class="form-group col-md-6">
                  <label for="inputUsername">Username</label>
                  <input name="name" type="text" class="form-control" id="inputUsername" placeholder="Username">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
          </div>
          <div class="form-row px-3">
            <div class="form-group col-md-6">
              <label for="inputPassword4">Password</label>
              <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Password Confirm</label>
              <input name="password2" type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
          </div>
            @if($errors -> first())
            <div class="alert alert-danger px-3" role="alert">
                {{ $errors -> first() }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          <button type="submit" class="btn btn-primary ml-4 mt-2" style="border: none;">Tambah</button>
        </form>
        <a href="{{ route('profil') }}" class="btn-nav"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
    </div>
@endsection
