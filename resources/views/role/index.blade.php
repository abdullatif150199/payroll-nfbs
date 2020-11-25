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
            Daftar Role
        </h3>
        <div class="card-options">
            <a href="{{ route('dash.user.index') }}" class="btn btn-primary"><i class="fe fe-users"></i> Daftar User</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarRole">
            <thead>
                <tr>
                    <th>Nama Role</th>
                    <th>Hak Akses</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('role.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var oTable = $('#daftarRole').DataTable({
        serverSide: true,
        processing: true,
        // select: true,
        ajax: '{{ route('dash.role.datatable') }}',
        columns: [
            {data: 'name'},
            {data: 'permission'},
            {data: 'actions', orderable: false, searchable: false}
        ]
    });

    // $('#select-form').submit(function(e) {
    //     oTable.draw();
    //     e.preventDefault();
    // });

    $('#newUser').click(function () {
        $('.modal-title').text('Create User');
        $('#formUser').modal('show');
        $('input[name=_method]').val('POST');
        $('#formUser form')[0].reset();
    });

    function editUser(id) {
        var url = '{{ route('dash.user.edit', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('#formUser form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('.modal-title').text('Edit User');
                $('#formUser').modal('show');

                $('input[name=id]').val(data.id);
                $('input[name=server_ip]').val(data.server_ip);
                $('input[name=server_port]').val(data.server_port);
                $('input[name=serial_number]').val(data.serial_number);
            }
        });
    }

    $('#formUser form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        if (save_method == 'POST') {
            url = '{{ route('dash.user.store') }}';
        } else {
            url_raw = '{{ route('dash.user.update', ':id') }}';
            url = url_raw.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formUser form').serialize(),
            success: function (data) {
                $('#formUser').modal('hide');
                oTable.ajax.reload();
            },
            error: function () {
                alert('Gagal menambahkan data');
            }
        });
    });

    function hapusUser(id) {
        var url = '{{ route('dash.user.destroy', ':id') }}';
        url = url.replace(':id', id);
        $('#hapusUser .modal-body').text('Yakin ingin menghapus?');
        $('#hapusUser form').attr('action', url);
        $('#hapusUser').modal('show');
    }
</script>
@endpush
