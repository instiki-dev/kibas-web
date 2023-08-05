@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> kelurahan }}</th>
    <th scope="col">
        <div class="wrapper d-inline">
            <a href="/admin/kelurahan/edit-kelurahan/{{ $item -> id }}" type="button" class="btn btn-outline-success mr-3">Edit</a>
            <a onclick="return confirm('Yakin ingin menghapus data')" href="/admin/kelurahan/hapus-kelurahan/{{ $item -> id }}" type="button" class="btn btn-outline-danger">Hapus</a>
        </div>
    </th>
    </tr>
@endforeach
