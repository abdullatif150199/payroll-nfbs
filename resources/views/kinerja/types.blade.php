<div class="tags">
    @foreach ($data->kinerja as $item)
        <span class="tag" data-toggle="tooltip" title="{{ $item->value }}">
           {{ $item->title }}
           <a onclick="deleteModal({{ $item->id .', '. $data->nama_lengkap .', '. $data->id }})" class="tag-addon"><i class="fe fe-x"></i></a>
           <a onclick="editModal({{ $item->id .', '. $data->nama_lengkap }})" class="tag-addon"><i class="fe fe-edit"></i></a>
         </span>
    @endforeach
</div>
