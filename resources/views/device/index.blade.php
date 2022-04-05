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
            <a href="{{ route('dash.fingerprint.index') }}" class="btn btn-primary mr-2">
                <svg xmlns="http://www.w3.org/2000/svg"
                    style="width: 1.25rem; height: 1.25rem; vertical-align: -5px; line-height: 1;" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                </svg>
                Rekam Sidik Jari
            </a>
            <button type="button" id="newDevice" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarDevice">
            <thead>
                <tr>
                    <th>IP Server</th>
                    <th>Port</th>
                    <th>Serial Number</th>
                    <th>Keterangan</th>
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
        ajax: '{{ route('dash.device.datatable') }}',
        columns: [
            {data: 'server_ip'},
            {data: 'server_port'},
            {data: 'serial_number'},
            {data: 'keterangan'},
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
        var url = '{{ route('dash.device.edit', ':id') }}';
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
                $('input[name=serial_number]').val(data.serial_number);
                $('select[name=tipe]').val(data.tipe);
                $('input[name=keterangan]').val(data.keterangan);
            }
        });
    }

    $('#formDevice form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        if (save_method == 'POST') {
            url = '{{ route('dash.device.store') }}';
        } else {
            url_raw = '{{ route('dash.device.update', ':id') }}';
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
        var url = '{{ route('dash.device.destroy', ':id') }}';
        url = url.replace(':id', id);
        $('#hapusDevice .modal-body').text('Yakin ingin menghapus?');
        $('#hapusDevice form').attr('action', url);
        $('#hapusDevice').modal('show');
    }
</script>
@endpush
