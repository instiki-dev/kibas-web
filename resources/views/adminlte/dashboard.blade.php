@extends('adminlte.main')

@section('content')
<div class="content-header">
    @if(session() -> has('successMessage'))
    <div class="px-2 pt-2">
        <div class="alert alert-info" role="alert">
            {{ session('successMessage') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>
    @endif
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('show-tambah-admin') }}">Tambah Admin</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                  <div class="card-header row">
                    <h4 class="col-6">Pengumuman</h4>
                    <ul class="nav nav-pills card-header-pills col-6 d-flex justify-content-end">
                      <li class="nav-item">
                        <a class="nav-link active" href="{{ route('tambah-berita') }}">Buat Pengumuman</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body" style="max-height: 55vh; overflow-y: scroll;">
                    @foreach($berita as $item)
                    <div class="card mt-2 bg-info">
                        <div class="card-header">
                            {{ $item -> created_at }}
                      </div>
                      <div class="card-body">
                        <p class="card-text">{!! $item -> berita !!}</p>
                        <a onclick="return confirm('Yakin ingin menghapus pengumuman?')" href="{{ route('hapus-berita', ["pengumuman" => $item -> id]) }}" class="btn bg-navy">Hapus</a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card">
                  <div class="card-header row">
                    <h4 class="col-6">Survey</h4>
                    <ul class="nav nav-pills card-header-pills col-6 d-flex justify-content-end">
                      <li class="nav-item">
                        <a class="nav-link active" href="{{ route('show-tambah-survey') }}">Buat Survey</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body" style="max-height: 40vh; overflow-y: scroll;">
                    @foreach($survey as $item)
                    <div class="card mt-2 bg-gray">
                      <div class="card-body">
                        <p class="card-text">{{ $item -> pertanyaan }}</p>
                        <div class="d-flex">
                            <a onclick="return confirm('Yakin ingin menghapus survey?')" href="{{ route('hapus-survey', ["survey" => $item -> id]) }}" class="btn mr-3 btn-danger">Hapus</a>
                            <a href="{{ route('detail-survey', ["survey" => $item -> id]) }}" class="btn btn-info">Detail</a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
