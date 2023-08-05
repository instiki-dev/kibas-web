@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> no_rekening }}</th>
      <th scope="col">{{ $item -> pelanggan -> nama_pelanggan }}</th>
    <th scope="col">
        <div class="wrapper d-inline">
            <a href="/admin/rekening/edit-rekening/{{ $item -> id }}" type="button" class="btn btn-outline-success mr-3">Edit</a>
            <a href="/admin/rekening/detail-rekening/{{ $item -> id }}" type="button" class="btn btn-outline-info mr-3">Detail</a>
            <a onclick="return confirm('Yakin ingin menghapus data')" href="/admin/rekening/hapus-rekening/{{ $item -> id }}" type="button" class="btn btn-outline-danger">Hapus</a>
        </div>
    </th>
    </tr>
@endforeach
