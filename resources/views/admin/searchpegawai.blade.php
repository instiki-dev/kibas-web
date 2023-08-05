@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> nama }}</th>
      <th scope="col">{{ $item -> jabatan }}</th>
    <th scope="col">
        <div class="wrapper d-inline">
            @if (!$item -> user -> can('admin-page-access'))
                <a href="/admin/pegawai/edit-pegawai/{{ $item -> id }}" type="button" class="btn btn-outline-success mr-3">Edit</a>
                <a onclick="return confirm('Yakin ingin menghapus data')" href="/admin/pegawai/hapus-pegawai/{{ $item -> id }}" type="button" class="btn btn-outline-danger">Hapus</a>
            @endif
        </div>
    </th>
    </tr>
@endforeach
