<div class="item-action dropdown">
    <a href="javascript:void(0)" data-toggle="dropdown" class="icon">
        <i class="fe fe-more-vertical"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        @can(['edit karyawan', 'resign karyawan'])
        <a href="#" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Edit
        </a>
        <a href="#" class="dropdown-item"><i class="dropdown-icon fe fe-thumbs-up"></i> Persetujuan</a>
        @endcan
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item"><i class="dropdown-icon fe fe-trash"></i> Hapus</a>
    </div>
</div>
