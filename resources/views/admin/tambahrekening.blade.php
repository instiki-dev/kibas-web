@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/tambahadmin.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 pt-4 pl-4">
        <h2 class="mt-4 ml-2">Tambah Rekening</h2>
        <form class="px-4 pt-3" action="{{ route('tambah-rekening') }}" method="post">
            @csrf
        <div class="form-row px-3">
                <div class="form-group col-md-6">
                  <label for="inputRekening">Rekening</label>
                  <input name="no_rekening" type="text" class="form-control" id="inputUsername" placeholder="No Rekening">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Pelanggan</label>
                <select id="inputPelanggan" name="pelanggan_id" class="form-control selectpicker" data-live-search="true">
                    @foreach ($pelanggan as $item)
                    <option data-tokens="data" value={{ $item -> id }}>{{ $item -> nama_pelanggan }} ({{ $item -> nik_pelanggan }})</option>
                    @endforeach
                    <!-- <option data-tokens="data" value="0">Lainnya</option> -->
                </select>
                </div>
          </div>
        <div class="form-row px-3">
                <div class="form-group col-md-6">
                  <label for="inputKecamatan">Kecamatan</label>
                    <select id="inputKecamatan" name="kecamatan_id" class="form-control selectpicker" data-live-search="true">
                        @foreach ($kecamatan as $item)
                        <option data-tokens="data" value={{ $item -> id }}>{{ $item -> kecamatan }}</option>
                        @endforeach
                        <!-- <option data-tokens="data" value="0">Lainnya</option> -->
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputKelurahan">Kelurahan</label>
                    <select id="inputKelurahan" name="kelurahan_id" class="form-control selectpicker" data-live-search="true">
                        @foreach ($kelurahan as $item)
                        <option data-tokens="data" value={{ $item -> id }}>{{ $item -> kelurahan }}</option>
                        @endforeach
                    </select>
                </div>
          </div>
          <div class="form-row px-3">
            <div class="form-group col-md-6">
              <label for="inputLatitude">Latitude</label>
              <input name="lat" type="text" class="form-control" id="inputLatitude" placeholder="Latitude">
            </div>
            <div class="form-group col-md-6">
              <label for="inputLongtitude">Longtitude</label>
              <input name="lng" type="text" class="form-control" id="inputLongtitude" placeholder="Longtitude">
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
        <a href="{{ route('rekening') }}" class="btn-nav"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
    </div>
@endsection
