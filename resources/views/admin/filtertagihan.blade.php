@foreach($data as $item)
    <tr>
      <th scope="col">{{ $loop -> index + 1}}</th>
      <th scope="col">{{ $item -> no_tagihan }}</th>
      <th scope="col">{{ $item -> nominal }}</th>
    <th scope="col">
        @if($item -> status == 1)
            <div class="alert a-3" role="alert">
                Belum Lunas
            </div>
        @else
            <div class="alert a-4" role="alert">
              Lunas
            </div>
        @endif
    </th>
    <th scope="col">
        <div class="wrapper d-inline">
            <a href="/admin/rekening/tagihan/detail/{{ $item -> no_tagihan }}" type="button" class="btn btn-outline-info mr-3">Detail Tagihan</a>
        </div>
    </th>
    </tr>
@endforeach
