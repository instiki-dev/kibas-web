@extends('admin.template')

@section('style')
    <link rel="stylesheet" type="text/css" href="/style/golongan.css">
@endsection

@section('content')
<div class="parent w-100 h-100 py-3 pl-3">
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
    <h2 class="ml-5 mt-4 mb-3">Daftar Pengaduan</h2>
    <div class="pr-5">
        <div class="d-flex widget w-100 justify-content-end pr-5">
            <input id="inputSearch" class="mr-3 pl-3 py-1 w-25" type="text" placeholder="Cari...">
        </div>
    </div>
    <div class="child w-100 h-75 px-5 py-2 mt-2">
        <div class="pl-4 pr-5 mt-3">
            <table class="table table-sm table-info">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Rekening</th>
                      <th scope="col">Waktu Lapor</th>
                      <th scope="col">Aksi</th>
                    </tr>
              </thead>
                <tbody id="tableContent">
                    @foreach($data as $item)
                        <tr>
                          <th scope="col">{{ $loop -> index + 1}}</th>
                          <th scope="col">{{ $item -> rekening -> no_rekening }}</th>
                          <th scope="col">{{ $item -> created_at }}</th>
                        <th scope="col">
                            <div class="wrapper d-inline">
                                <a href="{{ route('show-detail-pengaduan', ['pengaduan' => $item -> id]) }}" type="button" class="btn btn-outline-info mr-3">Detail</a>
                            </div>
                        </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="/js/SearchPengaduan.js"></script>
    <script src="/js/child.js"></script>
    <script>
        if (window.innerWidth < 600) {
            console.log("Hello")
            search.classList.add("w-100")
        }
    </script>
@endsection
