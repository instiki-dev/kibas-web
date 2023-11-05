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
                <h1 class="m-0">Pengumuman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pengumuman') }}">Kembali</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive pb-4 px-3" style="height: 80vh;">
                    <form class="px-4 pt-3" action="{{ route('post-tambah-berita') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-8">
                          <label for="inputJenis">Jenis Pengumuman</label>
                            <select id="inputJenis" name="jenis" class="form-control selectpicker" data-live-search="true">
                                @foreach ($jenis as $item)
                                <option data-tokens="data" value={{ $item -> id }}>{{ $item -> jenis}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-8 d-none" id="pelanggan">
                          <label for="inputPelanggan">Pilih Rekening</label>
                            <select id="inputPelanggan" name="pelanggan_id[]" multiple class="form-control selectpicker" data-live-search="true" data-actions-box="true">
                                @foreach ($rekening as $item)
                                <option data-tokens="data" value={{ $item -> id }}>{{ $item ->  no_rekening}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="fieldContent">
                            <div class="form-group col-md-6" id="area">
                              <label for="inputArea">Area</label>
                                <select id="inputArea" name="area_id[]" class="form-control selectpicker" multiple data-live-search="true" data-actions-box="true">
                                    @foreach ($area as $item)
                                    <option data-tokens="data" value={{ $item -> id }}>{{ $item -> area}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                      <div class="form-group row w-50 d-none" id="divJudul">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                          <input name="judul" type="text" class="form-control" id="judul">
                        </div>
                      </div>

                    <div class="form-group w-50 row d-none" id="divFoto">
                        <label for="judul" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                          <input name="foto" type="file" class="form-control" id="foto">
                        </div>
                      </div>

                    <div class="form-group row w-50 d-none" id="divPenulis">
                        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col-sm-10">
                          <input name="penulis" type="text" class="form-control" id="penulis" required>
                        </div>
                      </div>

                        <div class="form-group col-md-12">
                          <label for="inputBerita">Tulis Berita</label>
                          <input id="pengumuman" type="hidden" name="berita">
                          <div id="summernote"></div>
                        </div>

                        <button onclick="return confirm('Yakin ingin membuat pengumuman?')" type="submit" class="btn btn-danger mt-3 ml-3">Buat Pengumuman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <script>
        var firebaseConfig = {
             apiKey: "AIzaSyAU1n2MEzdH92UhAvC8dbYr5LjGl9hmACs",
              authDomain: "kibas-project-794a7.firebaseapp.com",
              projectId: "kibas-project-794a7",
              storageBucket: "kibas-project-794a7.appspot.com",
              messagingSenderId: "1050695989267",
              appId: "1:1050695989267:web:123a980206379f548c67e6"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        function startFCM() {
            messaging
                .requestPermission()
                .then(function () {
                    return messaging.getToken()
                })
                .then(function (response) {
                    console.log(response);
                }).catch(function (error) {
                    alert(error);
                });
        }
        messaging.onMessage(function (payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });
    </script>


  <script>
      $('#summernote').summernote({
        placeholder: 'Tulis pengumuman',
        tabsize: 2,
        height: 100
      });
      const input = document.querySelector("#pengumuman")
      const jenis = document.querySelector("#inputJenis")
      const inputPelanggan = document.getElementById("pelanggan")
      const inputArea = document.getElementById("area")
      const judul = document.getElementById("divJudul")
      const foto = document.getElementById("divFoto")
      const penulis = document.getElementById("divPenulis")

      $("#summernote").on("summernote.change", function (e) {   // callback as jquery custom event
           input.value =  $('#summernote').summernote('code');
        });

        $('#inputJenis').selectpicker('val', '4');

      jenis.addEventListener("change", function() {
          if (jenis.value < 3) {
              inputPelanggan.classList.remove("d-none")
              inputArea.classList.add("d-none")
              judul.classList.add("d-none")
              foto.classList.add("d-none")
              penulis.classList.add("d-none")
          } else if (jenis.value == 5) {
              inputPelanggan.classList.add("d-none")
              inputArea.classList.add("d-none")
              judul.classList.remove("d-none")
              foto.classList.remove("d-none")
              penulis.classList.remove("d-none")
        } else {
              inputPelanggan.classList.add("d-none")
              inputArea.classList.remove("d-none")
              judul.classList.add("d-none")
              foto.classList.add("d-none")
              penulis.classList.add("d-none")
          }
      })
    </script>
@endsection
