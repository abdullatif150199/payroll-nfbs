<div class="item-action dropdown">
    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-secondary btn-sm dropdown-toggle">Actions</a>
    <div class="dropdown-menu dropdown-menu-right">
        @can(['edit karyawan', 'resign karyawan'])
        <a onclick="editKaryawan({{$data->id}})" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Edit
        </a>
        <a onclick="resignKaryawan({{$data->id .','. "'". $data->nama_lengkap ."'"}})" class="dropdown-item"><i
                class="dropdown-icon fe fe-log-out"></i> Resign/Berhenti</a>
        @endcan
        <div class="dropdown-divider"></div>
        <a href="{{ route('dash.karyawan.show', $data->id) }}" class="dropdown-item"><i
                class="dropdown-icon fe fe-list"></i> Rincian</a>
    </div>
</div>
