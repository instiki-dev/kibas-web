@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> nama_pelanggan }}</th>
      <th scope="col">{{ $item -> nik_pelanggan }}</th>
    <th scope="col">
        <div class="wrapper d-inline">
            <a href="/admin/pelanggan/edit-pelanggan/{{ $item -> id }}" type="button" class="btn btn-outline-success mr-3">Edit</a>
            <a href="/admin/pelanggan/detail-pelanggan/{{ $item -> id }}" type="button" class="btn btn-outline-info mr-3">Detail</a>
            <a onclick="return confirm('Yakin ingin menghapus data')" href="/admin/pelanggan/hapus-pelanggan/{{ $item -> id }}" type="button" class="btn btn-outline-danger">Hapus</a>
        </div>
    </th>
    </tr>
@endforeach
