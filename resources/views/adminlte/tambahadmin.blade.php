@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                      <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                      </a>
                    </li>
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
                          <button type="submit" class="btn btn-danger ml-4 mt-2" style="border: none;">Tambah <i class="fa fa-user" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
