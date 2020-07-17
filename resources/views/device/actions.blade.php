<a href="{{ route('dash.device.check', $data->id) }}" class="btn btn-info btn-sm" onclick="event.preventDefault();
    document.getElementById('check-form{{ $data->id }}').submit();" title="check">
    <i class="fe fe-check-square"></i>
</a>

<form id="check-form{{ $data->id }}" action="{{ route('dash.device.check', $data->id) }}" method="POST"
    style="display: none;">
    @csrf
</form>

<a class="btn btn-warning btn-sm edit-device" onclick="editDevice({{ $data->id }})" title="edit"><i
        class="fe fe-edit"></i></a>
<a class="btn btn-danger btn-sm" onclick="hapusDevice({{ $data->id }})" title="hapus"><i class="fe fe-trash"></i></a>
