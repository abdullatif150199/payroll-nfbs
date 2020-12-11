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
            <a href="{{ route('dash.user.index') }}" class="btn btn-primary mr-2"><i class="fe fe-users"></i> Daftar User</a>
            <a href="#" id="newRole" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah Role</a>
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

    $('#newRole').click(function () {
        $('.modal-title').text('Tambah Role');
        $('#formRole').modal('show');
        $('#btn-form-role').text('Tambah');
        $('input[name=_method]').val('POST');
        $('#formRole form')[0].reset();
    });

    function editRole(id) {
        var url = '{{ route('dash.role.edit', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('#btn-form-role').text('Update');
        $('#formRole form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('.modal-title').text('Edit Role');
                $('#formRole').modal('show');

                $('input[name=id]').val(data.id);
                $('input[name=name]').val(data.name);

                $.each(data.permissions, function (key, val) {
                    $('#permission' + val.id).prop('checked',true);
                });
            }
        });
    }

    $('#formRole form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        if (save_method == 'POST') {
            url = '{{ route('dash.role.store') }}';
        } else {
            url_raw = '{{ route('dash.role.update', ':id') }}';
            url = url_raw.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formRole form').serialize(),
            success: function (data) {
                $('#formRole').modal('hide');
                oTable.ajax.reload();
                toastr.success(data.message, "Success");
            },
            error: function () {
                toastr.error('Gagal memproses data', 'Failed');
            }
        });
    });

    function hapusRole(id) {
        $('input[name=id]').val(id);
        $('#hapusRole .modal-body').text('Yakin ingin menghapus?');
        $('#hapusRole').modal('show');
    }

    $('#hapusRole form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var url = '{{ route('dash.role.destroy', ':id') }}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'DELETE',
            data: $('#hapusRole form').serialize(),
            success: function (data) {
                $('#hapusRole').modal('hide');
                oTable.ajax.reload();
                toastr.success(data.message, "Success");
            },
            error: function () {
                toastr.error('Gagal memproses data', 'Failed');
            }
        });
    });
</script>
@endpush
