@if ($data->status === null)
    <a onclick="editLembur({{$data->id}})" class="icon" title="Edit">
        <i class="fe fe-edit"></i>
    </a>
@endif
