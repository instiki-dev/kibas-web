@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/profil.css">
@endsection

@section('content')
    <div class="parent h-100 w-100 py-3 pl-3">
        <div class="top-profil w-100 d-flex justify-content-end align-items-center">
            <h3 class="mr-3">Hi {{ $data["call"] }}...</h3>
            <div class="logout">
                <a onclick="return confirm('Yakin ingin logout')" href="{{ route('logout') }}" class="d-flex align-items-center px-3 py-2"><ion-icon name="log-out-outline"></ion-icon></a>
            </div>
        </div>
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
        <h2 class="ml-5 mt-4">Profil Admin</h2>
        <div class="w-100 px-5 py-2 mb-4">
            <form action="{{ route('edit-admin') }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputUsername">Username</label>
                      <input type="text" readonly class="form-control" name="name" id="inputUsername" value="{{ $data["name"] }}" placeholder="Username">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputNama">Nama Lengkap</label>
                      <input name="fullname" type="text" class="form-control" id="inputNama" value="{{ $data["fullname"] }}" placeholder="Nama Lengkap">
                    </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input name="email" value="{{ $data["email"] }}" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Password</label>
                  <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Ubah Password">
                </div>
              </div>
              <div class="d-inline">
                  <button id="updateBtn" onclick="return confirm('Yakin ingin merubah data')" type="submit" class="btn btn-primary" style="border: none;">Update Profil</button>
                  <a href="{{ route('show-tambah-admin')}}" id="tambah" class="btn btn-primary"><ion-icon class="mr-2" name="person-add-outline"></ion-icon>Tambah Admin</a>
              </div>
            </form>
        </div>
        <div class="container d-flex justify-content-start align-items-center align-content-center pt-4">
            <h2 class="ml-5">Pengumuman</h2>
            <a href="{{ route('tambah-berita') }}" id="tambahPengumuman" class="ml-3 circle-btn" style="color: #4942E4; font-weight: bold;"><ion-icon name="add-circle-outline"></ion-icon></a>
        </div>
        <div class="all-pengumuman px-5 h-75 mt-3 mx-5 pt-3">
            <div class="pengumuman-item h-100 pr-3">
                @foreach($berita as $item)
                <div class="card mt-2">
                    <div class="card-header">
                        {{ $item -> created_at }}
                  </div>
                  <div class="card-body">
                    <p class="card-text">{!! $item -> berita !!}</p>
                    <a onclick="return confirm('Yakin ingin menghapus pengumuman?')" href="{{ route('hapus-berita', ["pengumuman" => $item -> id]) }}" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="container d-flex justify-content-start align-items-center align-content-center pt-4">
            <h2 class="ml-5">Survey</h2>
            <a href="{{ route('show-tambah-survey') }}" id="tambahPengumuman" class="ml-3 circle-btn" style="color: #4942E4; font-weight: bold;"><ion-icon name="add-circle-outline"></ion-icon></a>
        </div>
        <div class="all-survey px-5 h-75 mt-3 mx-5 pt-3">
            <div class="pengumuman-item h-100 pr-3">
                @foreach($survey as $item)
                <div class="card mt-2">
                    <div class="card-header">
                        <h5>Pertanyaan</h5>
                  </div>
                  <div class="card-body">
                    <p class="card-text">{{ $item -> pertanyaan }}</p>
                    <a onclick="return confirm('Yakin ingin menghapus pengumuman?')" href="{{ route('hapus-survey', ["survey" => $item -> id]) }}" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var inline = document.querySelector("div.d-inline")
        var tambah = document.querySelector("#tambah")

        if (window.innerWidth < 600) {
            inline.classList.add("d-flex")
            tambah.classList.add("ml-1")
        }
    </script>
@endsection

