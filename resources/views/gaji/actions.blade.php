<div class="item-action dropdown">
    <a href="javascript:void(0)" data-toggle="dropdown" class="icon">
        <i class="fe fe-more-vertical"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <a onclick="detailGaji({{ $data->id }})" class="dropdown-item"><i class="dropdown-icon fe fe-list"></i> Detail </a>
        <a href="{{ route('dash.gaji.slip', $data->id) }}" target="_blank" class="dropdown-item"><i class="dropdown-icon fe fe-file-text"></i> Slip gaji </a>
    </div>
</div>
