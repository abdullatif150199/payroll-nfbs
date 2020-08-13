<div>{{ $data->nama_lengkap }}</div>
<div class="small text-muted">
    <span class="tag">
        Jenis kinerja:
        <a onclick="tambahKinerja({{ $data->id }})" class="tag-addon tag-primary" title="Tamahkan jenis kinerja"><i
                class="fe fe-edit-2"></i></a>
    </span>
</div>
<div class="small text-muted">
    @if ($data->persentasekinerja->count() > 0)
    <?php $lists = [] ?>

    @foreach ($data->persentasekinerja as $item)
    <?php $lists[] = "<span class=\"text-primary\">". $item->title ."</span>" ?>
    @endforeach

    {!! implode(' | ', $lists) !!}

    @else
    <span>Tidak ada kinerja</span>
    @endif
</div>
