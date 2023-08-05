@extends('admin.template')

@section('style')
     <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
      <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/style/tambahpelanggan.css">
@endsection

@section('content')
    <div class="parent w-100 h-100 pt-4 pl-4">
        <h2 class="mt-4 ml-2">Tambah Pengumuman</h2>
        <form class="px-4 pt-3" action="{{ route('post-tambah-berita') }}" method="post">
            @csrf
            <div class="form-row px-3">
                <div class="form-group col-md-12">
                  <input id="pengumuman" type="hidden" name="berita">
                  <trix-editor input="pengumuman"></trix-editor>
                </div>
              </div>
            <button type="submit" class="btn btn-primary mt-3">Buat Pengumuman</button>
        </form>
        <a href="{{ route('profil') }}" class="btn-nav mt-4 mb-3"><ion-icon name="arrow-back-circle-outline" style="color: #4942E4;"></ion-icon></a>
    </div>
@endsection
