@switch($data->tipe)
@case('1')
<div class="small text-muted">non shift</div>
@break
@case('2')
<div class="small text-muted">shift | non shift</div>
@break
@default
<div class="small text-muted">untuk apel</div>
@endswitch
<div>{{ $data->keterangan }}</div>
