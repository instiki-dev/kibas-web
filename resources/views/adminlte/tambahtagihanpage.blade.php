@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Tagihan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('tagihan') }}" class="btn btn-outline-secondary">Kembali 
<i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
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
                <form class="px-4 pt-3" action="{{ route('tambah-tagihan-baru') }}" method="post">
                    @csrf
                    <div class="form-row px-3">
                        <div class="form-group col-md-6">
                          <label for="inputNoTagihan">No Tagihan</label>
                          <input name="no_tagihan" type="text" class="form-control" id="inputNoTagihan" placeholder="No Tagihan">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputNoTagihan">No Rekening</label>
                        <select id="inputRekening" name="no_rekening" class="form-control selectpicker" data-live-search="true">
                            @foreach ($rekening as $item)
                            <option data-tokens="data" value={{ $item -> no_rekening }}>{{ $item -> no_rekening }}</option>
                            @endforeach
                            <!-- <option data-tokens="data" value="0">Lainnya</option> -->
                        </select>
                        </div>
                  </div>
                    <div class="form-row px-3">
                            <div class="form-group col-md-6">
                              <label for="inputBulan">Bulan</label>
                              <input name="bulan" type="number" class="form-control" id="inputBulan" placeholder="Bulan">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputTahun">Tahun</label>
                              <input name="tahun" type="number" class="form-control" id="inputTahun" placeholder="Tahun">
                            </div>
                      </div>
                      <div class="form-row px-3">
                        <div class="form-group col-md-6">
                          <label for="inputJatuhTempo">Jatuh Tempo</label>
                          <input name="tgl_jatuh_tempo" type="date" class="form-control" id="inputJatuhTempo" placeholder="Jatuh Tempo">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPetugas">Pembaca</label>
                            <select id="inputGolongan" name="pembaca_id" class="form-control selectpicker" data-live-search="true">
                                @foreach ($petugas as $item)
                                <option data-tokens="data" value={{ $item -> id }}>{{ $item -> nama }}</option>
                                @endforeach
                                <!-- <option data-tokens="data" value="0">Lainnya</option> -->
                            </select>
                        </div>
                      </div>

                    <div class="form-row px-4 mt-2">
                        <div class="form-group col-md-5">
                          <label for="inputKilometer">Kilometer</label>
                          <input name="kilometer" type="number" class="form-control" id="inputKilometer" placeholder="Kilometer">
                        </div>
                        <div class="form-group col-md-5">
                          <label for="inputNominal">Nominal</label>
                          <input name="nominal" type="number" class="form-control" id="inputNominal" placeholder="Nominal">
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
                      <button onclick="return confirm('Yakin ingin membuat tagihan?')" type="submit" class="btn btn-danger ml-4 mt-2 mb-3" style="border: none;">Tambah <i class="fa fa-plus" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
