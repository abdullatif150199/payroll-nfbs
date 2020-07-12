@extends('layouts.setting')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
<style>
    .dataTables_length {
        padding-left: 1rem;
        padding-top: 1rem;
    }

    .dataTables_filter {
        padding-right: 1rem;
        padding-top: 1rem;
    }

    .dataTables_info {
        padding-left: 1rem;
        padding-bottom: 1rem;
    }

    .dataTables_paginate {
        padding-right: 1rem;
        padding-bottom: 1rem;
    }

    .paginate_button .page-link {
        padding: 0.3rem 0.5rem
    }
</style>
@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Daftar Device Fingerprint
        </h3>
        <div class="card-options">
            <button type="button" id="newDevice" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarDevice">
            <thead>
                <tr>
                    <th>IP Server</th>
                    <th>Port Server</th>
                    <th>Serial Number</th>
                    <th>Tipe</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('device.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var oTable = $('#daftarDevice').DataTable({
        serverSide: true,
        processing: true,
        // select: true,
        ajax: '{{ route('dash.getDevice') }}',
        columns: [
            {data: 'server_ip'},
            {data: 'server_port'},
            {data: 'serial_number'},
            {data: 'tipe'},
            {data: 'actions', orderable: false, searchable: false}
        ]
    });
    // $('#select-form').submit(function(e) {
    //     oTable.draw();
    //     e.preventDefault();
    // });

    $('#newDevice').click(function () {
        $('.modal-title').text('Create Device');
        $('#formDevice').modal('show');
        $('input[name=_method]').val('POST');
        $('#formDevice form')[0].reset();
    });

    function editDevice(id) {
        var url = '{{ route('dash.editDevice', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('#formDevice form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('.modal-title').text('Edit Device');
                $('#formDevice').modal('show');

                $('input[name=id]').val(data.id);
                $('input[name=server_ip]').val(data.server_ip);
                $('input[name=server_port]').val(data.server_port);
                $('input[name=serial_number]').val(data.serial_number);
                $('input[name=tipe]').val(data.tipe);
            }
        });
    }

    $('#formDevice form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        if (save_method == 'POST') {
            url = '{{ route('dash.storeDevice') }}';
        } else {
            url_raw = '{{ route('dash.updateDevice', ':id') }}';
            url = url_raw.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formDevice form').serialize(),
            success: function (data) {
                $('#formDevice').modal('hide');
                oTable.ajax.reload();
            },
            error: function () {
                alert('Gagal menambahkan data');
            }
        });
    });

    function hapusDevice(id) {
        var url = '{{ route("dash.hapusDevice", ":id") }}';
        url = url.replace(':id', id);
        $('#hapusDevice .modal-body').text('Yakin ingin menghapus?');
        $('#hapusDevice form').attr('action', url);
        $('#hapusDevice').modal('show');
    }
</script>
@endpush
