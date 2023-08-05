@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> area }}</th>
      <th scope="col">{{ $item -> kecamatan ? $item -> kecamatan -> kecamatan : "-" }}</th>
    <th scope="col">
        <div class="wrapper d-inline">
            <a href="/admin/area/edit-area/{{ $item -> id }}" type="button" class="btn btn-outline-success mr-3">Edit</a>
            <a onclick="return confirm('Yakin ingin menghapus data')" href="/admin/area/hapus-area/{{ $item -> id }}" type="button" class="btn btn-outline-danger">Hapus</a>
        </div>
    </th>
    </tr>
@endforeach

