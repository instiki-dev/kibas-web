@extends('adminlte.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Pengumuman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Kembali <i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
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
                    <form class="px-4 pt-3" action="{{ route('post-tambah-berita') }}" method="post">
                        @csrf
                          <input id="pengumuman" type="hidden" name="berita">
                          <div id="summernote"></div>
                        <button type="submit" class="btn btn-primary mt-3">Buat Pengumuman <i class="fa fa-plus" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
  <script>
      $('#summernote').summernote({
        placeholder: 'Tulis berita',
        tabsize: 2,
        height: 100
      });
      const input = document.querySelector("#pengumuman")

      $("#summernote").on("summernote.change", function (e) {   // callback as jquery custom event
           input.value =  $('#summernote').summernote('code');
        });

    </script>
@endsection
