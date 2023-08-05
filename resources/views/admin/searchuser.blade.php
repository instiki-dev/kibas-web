@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> name }}</th>
      <th scope="col">{{ $item -> email }}</th>
    <th scope="col">
        <div class="wrapper d-inline">
            @if (!$item -> can('admin-page-access'))
                <a href="/admin/user/ubah-password/{{ $item -> id }}" type="button" class="btn btn-outline-success mr-3">Ubah Password</a>
            @endif
        </div>
    </th>
    </tr>
@endforeach
