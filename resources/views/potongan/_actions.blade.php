<a class="icon mr-2" onclick="editPotongan({{ $data->id }})" data-toggle="tooltip" title="edit">
    <i class="fe fe-edit"></i>
</a>
<a class="icon" onclick="hapusPotongan({{ $data->id ." ,'". $data->nama_potongan ."'" }})"
    data-toggle="tooltip" title="hapus">
    <i class="fe fe-trash"></i>
</a>
