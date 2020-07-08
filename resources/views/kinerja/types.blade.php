@if ($data->persentasekinerja->count() > 0)

@if ($data->kinerja->count() > 0)
<div class="tags">
    @foreach ($data->kinerja as $item)
    <span class="tag" data-toggle="tooltip" title="Nilai {{ $item->value }}">
        {{ $item->title }}
        <a onclick="deleteModal({{ $item->id .", '". $data->title ."', '". $data->id ."'" }})"
            class="tag-addon tag-warning" title="hapus"><i class="fe fe-x"></i></a>
    </span>
    @endforeach
</div>
@else
<span class="text-danger">Kinerja belum terisi</span>
@endif

@else
<span>-</span>
@endif
