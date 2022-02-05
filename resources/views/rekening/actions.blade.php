<a class="btn btn-warning btn-sm edit-rekening" onclick="editRekening({{ $data->id }})"><i class="fe fe-edit"></i>
    edit</a>
@if ($data->potongan()->count() < 1) @if ($data->id != config('var.rekening_cash_id') || $data->id !=
    config('var.rekening_transfer_id'))
    <a class="btn btn-danger btn-sm" onclick="hapusRekening({{ $data->id }})"><i class="fe fe-trash"></i> hapus</a>
    @endif
    @endif
