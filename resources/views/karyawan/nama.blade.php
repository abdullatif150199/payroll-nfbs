<div class="text-inherit hovertip">
    <strong>{{ $data->nama_lengkap }}</strong>
    <span class="hovertiptext">{{ $data->no_hp }}</span>
</div>
<div class="mt-2">
    @if ($data->status == 1)
    <span class="badge badge-primary">Jam wajib ({{ $data->jam_wajib }})</span>
    <span class="badge badge-primary">Jam ajar ({{ $data->jamAjar->jml }})</span>
    @endif
    <span class="badge badge-primary">Load ({{ $data->load }})</span>
</div>
