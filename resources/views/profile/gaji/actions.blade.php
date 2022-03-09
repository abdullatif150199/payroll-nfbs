<div class="item-action dropdown">
    <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">
        actions
    </button>
    <div class="dropdown-menu dropdown-menu-left">
        <a href="{{ route('profile.gaji.detail', $data->id) }}" class="dropdown-item"><i
                class="dropdown-icon fe fe-list"></i> Detail </a>
        <a href="https://wa.me/{{ setting('no_whatsapp_komplain') }}?text=#{{$data->karyawan->no_induk . urlencode("\n") }}Assalamu'alaikum..." target="_blank"
            class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Komplain </a>
        <a href="{{ route('profile.gaji.slip', $data->id) }}" target="_blank" class="dropdown-item"><i
                class="dropdown-icon fe fe-file-text"></i> Slip gaji </a>
    </div>
</div>
