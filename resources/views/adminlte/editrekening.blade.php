@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Rekening</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('rekening') }}">Kembali</a></li>
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
                    <form class="px-4 pt-3" action="/admin/rekening/edit-rekening/{{ $data -> id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-row px-3">
                                <div class="form-group col-md-6">
                                  <label for="inputRekening">Rekening</label>
                                  <input value="{{ $data -> no_rekening }}" name="no_rekening" type="text" class="form-control" id="inputUsername" placeholder="No Rekening">
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
                                        <!-- <option data-tokens="data" value="0">Lainnya</option> -->
                                    </select>
                                </div>
                          </div>
                          <div class="form-row px-3">
                            <div class="form-group col-md-6">
                              <label for="inputLatitude">Latitude</label>
                              <input value="{{ $data -> lat }}" name="lat" type="text" class="form-control" id="inputLatitude" placeholder="Latitude">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputLongtitude">Longtitude</label>
                              <input value="{{ $data -> lng }}" name="lng" type="text" class="form-control" id="inputLongtitude" placeholder="Longtitude">
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
                          <button type="submit" class="btn btn-danger ml-4 mt-2" style="border: none;">Edit</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#inputKecamatan').selectpicker('val', {{ $data -> kecamatan_id ? $data -> kecamatan_id : 0 }});
        $('#inputKelurahan').selectpicker('val', {{ $data -> kelurahan_id ? $data -> kelurahan_id : 0 }});
        $('#inputPelanggan').selectpicker('val', {{ $data -> pelanggan_id ? $data -> pelanggan_id : 0 }});
    </script>
@endsection
