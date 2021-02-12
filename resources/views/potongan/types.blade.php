<div class="tags">
    @foreach ($data->potongan as $item)
    <span class="tag tag-dark">
        <span data-toggle="tooltip" title="Jml Potongan Rp. {{ sumType($item->jumlah_potongan, $item->type) }}">
            {{ $item->nama_potongan .' ('. $item->pivot->qty .') - Exp: '. date('M Y', strtotime($item->pivot->end_at)) }}
        </span>
        <a onclick="deleteModal({{ $item->id .", '". $data->nama_lengkap ."', '". $data->id ."'" }})"
            class="tag-addon tag-warning" data-toggle="tooltip" title="hapus"><i class="fe fe-x"></i></a>
    </span>
    @endforeach
</div>
