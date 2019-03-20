<div class="tags">
    @foreach ($data->potongan as $item)
        <span class="tag" data-toggle="tooltip" title="Rp. {{ number_format($item->jumlah_potongan) }}">
           <a onclick="editForm({{ $item->id .", '". $data->nama_lengkap ."'" }})">{{ $item->nama_potongan }}</a>
           <a onclick="deleteForm({{ $item->id .", '". $data->nama_lengkap ."', '". $item->nama_potongan ."'" }})" class="tag-addon"><i class="fe fe-x"></i></a>
         </span>
    @endforeach
</div>
