@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Rekening</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('rekening') }}" class="btn btn-outline-secondary">Kembali <i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
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
                                <option data-tokens="data" value={{ $item -> id }}>{{ $item -> nama_pelanggan }} {{ $item -> nik_pelanggan == '' ? '' : '('.$item -> nik_pelanggan.')' }}</option>
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
                              <label for="inputArea">Area</label>
                                <select id="inputArea" name="area_id" class="form-control selectpicker" data-live-search="true">
                                    <option data-tokens="data" value="0">Pilih Area</option>
                                    @foreach ($area as $item)
                                    <option data-tokens="data" value={{ $item -> id }}>{{ $item -> area}}</option>
                                    @endforeach
                                </select>
                            </div>
                      </div>
                      <div class="form-row px-3">
                        <div class="form-group col-md-6">
                          <label for="inputKelurahan">Kelurahan</label>
                            <select id="inputKelurahan" name="kelurahan_id" class="form-control selectpicker" data-live-search="true">
                                @foreach ($kelurahan as $item)
                                <option data-tokens="data" value={{ $item -> id }}>{{ $item -> kelurahan }}</option>
                                @endforeach
                                <!-- <option data-tokens="data" value="0">Lainnya</option> -->
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputLatitude">Latitude</label>
                          <input name="lat" type="text" class="form-control" id="inputLatitude" placeholder="Latitude">
                        </div>
                        <div class="form-group col-md-3">
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
                      <button type="submit" class="btn btn-danger ml-4 mt-2" style="border: none;">Tambah <i class="fa fa-plus" aria-hidden="true"></i></button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#inputArea').selectpicker('val', "0");
    </script>
@endsection
