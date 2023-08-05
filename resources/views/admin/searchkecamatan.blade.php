@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> kecamatan }}</th>
    <th scope="col">
        <div class="wrapper d-inline">
            <a href="/admin/kecamatan/edit-kecamatan/{{ $item -> id }}" type="button" class="btn btn-outline-success mr-3">Edit</a>
            <a onclick="return confirm('Yakin ingin menghapus data')" href="/admin/kecamatan/hapus-kecamatan/{{ $item -> id }}" type="button" class="btn btn-outline-danger">Hapus</a>
        </div>
    </th>
    </tr>
@endforeach
