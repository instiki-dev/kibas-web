@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/tambahadmin.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 pt-4 pl-4">
        <h2 class="mt-4 ml-2">Edit Area</h2>
        <form class="px-4 pt-3" action="{{ route('edit-area', ['area' => $area -> id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group col-md-8">
              <label for="inputArea">Nama Area</label>
              <input value="{{ $area -> area }}" name="area" type="text" class="form-control" id="inputArea" placeholder="Nama Area">
            </div>
            <div class="form-group col-md-8">
              <label for="inputKecamatan">Nama Kecamatan</label>
               <select id="inputKecamatan" name="kecamatan_id" class="form-control selectpicker" data-live-search="true">
                    @foreach ($kecamatan as $item)
                    <option data-tokens="data" value={{ $item -> id }}>{{ $item -> kecamatan }}</option>
                    @endforeach
                    <option data-tokens="data" value="0">Lainnya</option>
                </select>
            </div>
            @if($errors -> first())
            <div class="alert alert-danger px-3" role="alert">
                {{ $errors -> first() }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          <button onclick="return confirm('Yakin ingin merubah data')" type="submit" class="btn btn-primary ml-4 mt-2" style="border: none;">Ubah</button>
        </form>
        <a href="{{ route('area') }}" class="btn-nav"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
    </div>
@endsection

@section('script')
    <script>
        $('.selectpicker').selectpicker('val', {{ $area -> kecamatan_id ? $area -> kecamatan_id : "0" }});
    </script>
@endsection
