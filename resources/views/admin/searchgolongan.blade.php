@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> golongan }}</th>
    <th scope="col">
        <div class="wrapper d-inline">
            <a href="/admin/golongan/edit-golongan/{{ $item -> id }}" type="button" class="btn btn-outline-success mr-3">Edit</a>
            <a href="/admin/golongan/hapus-golongan/{{ $item -> id }}" type="button" class="btn btn-outline-danger">Hapus</a>
        </div>
    </th>
    </tr>
@endforeach
