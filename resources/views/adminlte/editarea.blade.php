@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Area</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('area') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></li>
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
                      <button onclick="return confirm('Yakin ingin merubah data')" type="submit" class="btn btn-danger ml-4 mt-2" style="border: none;">Perbaharui <i class="fa fa-check" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('.selectpicker').selectpicker('val', {{ $area -> kecamatan_id ? $area -> kecamatan_id : "0" }});
    </script>
@endsection
