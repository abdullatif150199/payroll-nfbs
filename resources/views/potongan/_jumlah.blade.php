@if ($data->type === 'decimal')
{{ number_format($data->jumlah_potongan) }}
@else
@php
$ex = explode('*&', $data->jumlah_potongan)
@endphp
{{ $ex[0]*100 . '% ' . $ex[1] }}
@endif
