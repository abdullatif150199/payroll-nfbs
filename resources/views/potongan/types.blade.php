<div class="tags">
    @foreach ($data->potongan as $item)
    <span class="tag tag-dark" data-toggle="tooltip" title="Rp. {{ sumType($item->jumlah_potongan, $item->type) }}">
        {{ $item->nama_potongan .' | Exp: '. date('M Y', strtotime($item->pivot->end_at)) }}
        <a onclick="deleteModal({{ $item->id .", '". $data->nama_lengkap ."', '". $data->id ."'" }})"
            class="tag-addon tag-warning" data-toggle="tooltip" title="hapus"><i class="fe fe-x"></i></a>
    </span>
    @endforeach
</div>
