@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/tambahadmin.css">
    <link rel="stylesheet" type="text/css" href="/style/tambahsurvey.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 pt-4 pl-4">
        <h2 class="mt-4 ml-2">Tambah Survey</h2>
        <div class="form-wrapper h-75">
            <form class="px-4 pt-3" action="{{ route('tambah-survey') }}" method="post">
                @csrf
                <div class="form-group col-md-8">
                  <label for="inputPertanyaan">Masukkan Pertanyaan</label>
                  <input name="pertanyaan" type="text" class="form-control" id="inputPertanyaan" placeholder="Pertanyaan">
                </div>
                <div class="holder">
                </div>
                <div class="tambah-pertanyaan ml-4 d-flex align-items-center mt-4 mb-3">
                    <a id="btnTambah" class="mr-2"><ion-icon name="add-circle-outline"></ion-icon></a>
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
              <button type="submit" class="btn btn-primary ml-4 mt-2" style="border: none;">Submit</button>
            </form>
        </div>
        <div class="back-wrapper">
            <a href="{{ route('profil') }}" class="btn-nav mt-5"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/tambahfield.js"></script>
@endsection
