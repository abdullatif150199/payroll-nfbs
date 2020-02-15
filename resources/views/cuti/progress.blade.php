<div class="clearfix">
    <div class="float-left">
        <strong>{{ days_diff($data->end_at, $data->start_at) . ' hari lagi' }}</strong>
    </div>
    <div class="float-right">
        <small class="text-muted">{{ date('d M Y', strtotime($data->start_at)) .' - '. date('d M Y', strtotime($data->end_at)) }}</small>
    </div>
</div>
<div class="progress progress-xs">
    <div class="progress-bar bg-{{ percent_time($data->end_at, $data->start_at) == 100 ? 'red' : 'green'}}" role="progressbar" style="width: {{ percent_time($data->end_at, $data->start_at) .'%' }}" aria-valuenow="{{ percent_time($data->end_at, $data->start_at) }}" aria-valuemin="0" aria-valuemax="100"></div>
</div>
