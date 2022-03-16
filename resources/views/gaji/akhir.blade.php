<strong class="text-primary font-weight-bold">
    {{ number_format($data->gaji_akhir) }} 
    @if($data->approved === 'Y')
    <i class="fe fe-check-circle text-success" title="Approved"></i>
    @endif
</strong>
<span id="loader{{ $data->id }}" class="btn btn-secondary border-0 btn-loading shadow-none p-0"
    style="display: none;"></span>
