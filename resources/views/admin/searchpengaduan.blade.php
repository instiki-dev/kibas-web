@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> rekening -> no_rekening }}</th>
      <th scope="col">{{ $item -> created_at }}</th>
    <th scope="col">
        <div class="wrapper d-inline">
            <a href="/admin/pengaduan/detail-pengaduan/{{ $item -> id }}" type="button" class="btn btn-outline-info mr-3">Detail</a>
        </div>
    </th>
    </tr>
@endforeach
