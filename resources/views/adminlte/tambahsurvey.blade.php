@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Survey</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></li>
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
                    <form class="px-4 pt-3" action="{{ route('tambah-survey') }}" method="post">
                        @csrf
                        <div class="form-group col-md-8">
                          <label for="inputPertanyaan">Masukkan Pertanyaan</label>
                          <input name="pertanyaan" type="text" class="form-control" id="inputPertanyaan" placeholder="Pertanyaan">
                        </div>
                        <div class="holder">
                        </div>
                        <div class="tambah-pertanyaan ml-4 d-flex align-items-center mt-4 mb-3">
                            <a id="btnTambah" class="mr-2"><i class="fas fa-plus-circle"></i></a>
                            <label style="margin: 0;">Tambah Detail Pertanyaan</label>
                            <br>
                        </div>
                        @if($errors -> first())
                        <div class="alert alert-danger px-3" role="alert">
                            {{ $errors -> first() }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                      <button type="submit" class="btn btn-danger ml-4 mt-2" style="border: none;">Kirim <i class="fa fa-plus" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="/js/tambahfield.js"></script>
@endsection
