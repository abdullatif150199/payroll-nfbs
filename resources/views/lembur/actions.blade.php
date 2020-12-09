<div class="item-action dropdown">
    <a href="javascript:void(0)" data-toggle="dropdown" class="icon">
        <i class="fe fe-more-vertical"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        @can(['edit lembur', 'hapus lembur', 'persetujuan lembur'])
        <a onclick="editLembur({{$data->id}})" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Edit
        </a>
        <a onclick="persetujuan({{ $data->id }})" class="dropdown-item"><i class="dropdown-icon fe fe-thumbs-up"></i> Persetujuan</a>
        <div class="dropdown-divider"></div>
        <a onclick="hapusLembur({{ $data->id }})" class="dropdown-item"><i class="dropdown-icon fe fe-trash"></i> Hapus</a>
        @endcan
    </div>
</div>
