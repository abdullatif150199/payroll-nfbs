@if ($data->status == 'approve')
<span class="tag tag-rounded tag-green">disetujui</span>
@elseif ($data->status == 'disapprove')
<span class="tag tag-rounded tag-gray">tidak disetujui</span>
@else
<span class="tag tag-rounded tag-yellow">menunggu persetujuan</span>
@endif
