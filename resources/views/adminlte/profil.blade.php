@extends('adminlte.main')

@section('content')
<div class="content-header">
    @if(session() -> has('successMessage'))
    <div class="px-2 pt-2">
        <div class="alert alert-info" role="alert">
            {{ session('successMessage') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>
    @endif
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profil Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
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
                    <form action="{{ route('edit-admin') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputUsername">Username</label>
                              <input type="text" readonly class="form-control" name="name" id="inputUsername" value="{{ $data["name"] }}" placeholder="Username">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputNama">Nama Lengkap</label>
                              <input name="fullname" type="text" class="form-control" id="inputNama" value="{{ $data["fullname"] }}" placeholder="Nama Lengkap">
                            </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Email</label>
                          <input name="email" value="{{ $data["email"] }}" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Password</label>
                          <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Ubah Password">
                        </div>
                      </div>
                      <div class="d-inline">
                          <button id="updateBtn" onclick="return confirm('Yakin ingin merubah data')" type="submit" class="btn btn-primary" style="border: none;">Update Profil</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
