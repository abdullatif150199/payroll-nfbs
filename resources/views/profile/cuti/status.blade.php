@if ($data->approved_at === null)
    @if ($data->status === null)
        <span class="tag tag-yellow tag-rounded">menunggu persetujuan</span>
    @else
        <span class="tag tag-grey tag-rounded">tidak disetujui</span>
    @endif
@else
    <span class="tag tag-green tag-rounded">disetujui</span>
@endif
