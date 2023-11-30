@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Pelanggan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pelanggan') }}" class="btn btn-outline-secondary">Kembali <i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
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
                    <form class="px-4 pt-3" action="{{ route('tambah-pelanggan') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="inputNama">Nama Lengkap</label>
                                <input name="fullname" type="text" class="form-control" id="inputNama" placeholder="Nama Lengkap">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputUsername">Username</label>
                                <input name="name" type="text" class="form-control" id="inputUsername" placeholder="Username">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password Confirm</label>
                                <input name="password2" type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="inputNomor">Nomor Pelanggan</label>
                                <input name="nomor_pelanggan" type="text" class="form-control" id="inputNomor" placeholder="Nomor Pelanggan">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputNIK">NIK</label>
                                <input name="nik" type="text" class="form-control" id="inputNIK" placeholder="NIK">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputGolongan">Golongan</label>
                                <select id="inputGolongan" name="golongan_id" class="form-control selectpicker" data-live-search="true">
                                    @foreach ($golongan as $item)
                                    <option data-tokens="data" value={{ $item -> id }}>{{ $item -> golongan }}</option>
                                    @endforeach
                                    <!-- <option data-tokens="data" value="0">Lainnya</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputAlamat">Alamat</label>
                                <input name="alamat_pelanggan" type="text" class="form-control" id="inputAlamat" placeholder="Alamat">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputKecamatan">Kecamatan</label>
                                <select id="inputKecamatan" name="kecamatan_id" class="form-control selectpicker" data-live-search="true">
                                    @foreach ($kecamatan as $item)
                                    <option data-tokens="data" value={{ $item -> id }}>{{ $item -> kecamatan }}</option>
                                    @endforeach
                                    <!-- <option data-tokens="data" value="0">Lainnya</option> -->
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputKelurahan">Kelurahan</label>
                                <select id="inputKelurahan" name="kelurahan_id" class="form-control selectpicker" data-live-search="true">
                                    @foreach ($kelurahan as $item)
                                    <option data-tokens="data" value={{ $item -> id }}>{{ $item -> kelurahan }}</option>
                                    @endforeach
                                    <!-- <option data-tokens="data" value="0">Lainnya</option> -->
                                </select>
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
                      <button type="submit" class="btn btn-danger mt-2 mb-3" style="border: none;">Tambah <i class="fa fa-plus" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
