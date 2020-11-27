<div>{{ yearMonth($data->date) }}</div>
@if ($data->status == 'approve')
    <span class="badge badge-success">disetujui</span>
@elseif ($data->status == 'disapprove')
    <span class="badge badge-secondary">tidak disetujui</span>
@else
    <span class="badge badge-warning">menunggu persetujuan</span>
@endif
