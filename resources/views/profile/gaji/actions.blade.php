<div class="item-action dropdown">
    <button data-toggle="dropdown" class="btn btn-secondary btn-sm dropdown-toggle">
        actions
    </button>
    <div class="dropdown-menu dropdown-menu-left">
        <a href="{{ route('profile.gaji.detail', $data->id) }}" class="dropdown-item"><i class="dropdown-icon fe fe-list"></i> Detail </a>
        <a href="https://wa.me/{{ $data->karyawan->no_hp }}?text=Assalaamualaikum" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Komplain </a>
    </div>
</div>
