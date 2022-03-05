{{-- <div class="text-inherit hovertip">
    <strong>{{ $data->nama_lengkap }}</strong>
    <span class="hovertiptext">{{ $data->no_hp }}</span>
</div> --}}
<strong>
    <a href="{{ route('dash.karyawan.show', $data->id) }}" style="color: rgb(75 85 99);">{{ $data->nama_lengkap }}</a>
</strong>
<div class="mt-2">
    @if ($data->status == 1)
    <span class="tag">Jam wajib ({{ $data->jam_wajib }})</span>
    <span class="tag">Jam ajar ({{ $data->jamAjar->jml }})</span>
    @endif
    <span class="tag">Load ({{ $data->load }})</span>
</div>
