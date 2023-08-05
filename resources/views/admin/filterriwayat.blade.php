@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> pengaduan -> rekening -> no_rekening }}</th>
      <th scope="col">{{ $item -> created_at }}</th>
      <th scope="col">{{ $item -> pengaduan_id }}</th>
    <th scope="col">
        @if($item -> status == 1)
            <div class="alert a-1" role="alert">
                Belum Dikonfirmasi
            </div>
        @elseif($item -> status == 2)
            <div class="alert a-2" role="alert">
                Menunggu
            </div>
        @elseif($item -> status == 3)
            <div class="alert a-3" role="alert">
                Diproses
            </div>
        @else
            <div class="alert a-4" role="alert">
               Selesai
            </div>
        @endif
    </th>
    <th scope="col">
        <div class="wrapper d-inline">
            <a href="/admin/rekening/riwayat-pengaduan/detail/{{ $item -> id }}" type="button" class="btn btn-outline-info mr-3">Detail Pengaduan</a>
        </div>
    </th>
    </tr>
@endforeach
