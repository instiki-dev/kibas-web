@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/tambahpelanggan.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 pt-4 pl-4">
        <h2 class="mt-4 ml-2">Tambah Tagihan</h2>
        <form class="px-4 pt-3" action="{{ route('tambah-tagihan', ['rekening' => $rekening -> no_rekening]) }}" method="post">
            @csrf
            <div class="form-group col-md-8">
              <label for="inputNoTagihan">No Tagihan</label>
              <input name="no_tagihan" type="text" class="form-control" id="inputNoTagihan" placeholder="No Tagihan">
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
          <button onclick="return confirm('Yakin ingin membuat tagihan?')" type="submit" class="btn btn-primary ml-4 mt-2 mb-3" style="border: none;">Tambah</button>
        </form>
        <a href="{{ route('show-tagihan', ['rekening' => $rekening -> no_rekening]) }}" class="btn-nav mt-4 mb-3"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
    </div>
@endsection
