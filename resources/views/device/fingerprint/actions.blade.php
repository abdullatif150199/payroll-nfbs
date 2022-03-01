<a href="{{ route('dash.fingerprint.upload') }}" class="btn btn-danger btn-sm" title="Upload ke mesin"><i
        class="fe fe-upload"></i></a>
{{-- <button class="btn btn-danger btn-sm" onclick="uploadToDevice({{ $data->id }})" title="Upload ke mesin"><i
        class="fe fe-upload"></i></button> --}}
<button class="btn btn-info btn-sm" onclick="checkToDevice({{ $data->id }})" title="cek ke mesin">
    <i class="fe fe-check-square"></i>
</button>
