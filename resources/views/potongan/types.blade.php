<div class="tags">
    @foreach ($data->potongan as $item)
        <span class="tag" data-toggle="tooltip" title="Rp. {{ sumType($item->jumlah_potongan, $item->type) }}">
           {{ $item->nama_potongan }}
           <a onclick="deleteModal({{ $item->id .", '". $data->nama_lengkap ."', '". $data->id ."'" }})" class="tag-addon"><i class="fe fe-x"></i></a>
         </span>
    @endforeach
</div>