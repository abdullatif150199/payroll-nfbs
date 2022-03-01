@forelse ($data as $item)
<div>
    <span>{{ $item->nama }} : </span>
    <strong>{{ number_format($item->jumlah) }}</strong>
</div>
@empty
<span class="text-muted">Tidak ada potongan</span>
@endforelse
