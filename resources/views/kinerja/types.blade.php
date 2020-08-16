@if ($data->persentasekinerja->count() > 0)

@if ($data->gajiOne)
@if ($data->gajiOne->historyKinerja()->exists())
<div class="tags">
    @foreach ($data->gajiOne->historyKinerja as $item)
    <span class="tag">
        {{ $item->title }}
        <span class="tag-addon tag-success">{{ $item->value }}</span>
    </span>
    @endforeach
</div>
@endif
@endif

@else
<span>-</span>
@endif
