@extends('layouts.main')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">
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
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Apel hari apa aja?
                <div class="card-options">
                    <button class="btn btn-primary" id="newJadwal">
                        <i class="fe fe-plus"></i> Tambah
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table"
                    id="apelTable">
                    <thead>
                        <tr>
                            <th class="w-1">Hari</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('kehadiran.modals_jadwal')

@endsection

@push('scripts')
<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
<script>
    var oTable = $('#apelTable').DataTable({
        serverSide: true,
        processing: true,
        select: true,
        ajax: '{{ route('dash.kehadiran.jadwal') }}',
        columns: [
            {data: 'day_name'},
            {data: 'start_time_at'},
            {data: 'end_time_at'},
            {data: 'actions', orderable:false, searchable:false}
        ]
    });

    $('#newJadwal').click(function () {
        $('#formJadwal form')[0].reset();
        $('#formJadwal').modal('show');
    });

    function editJadwal(id) {
        var url = '{{ route('dash.kehadiran.edit', ':id') }}?edit=jadwal';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('input[name=req]').val('update-jadwal');
        $('#formJadwal form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#formJadwal .modal-title').text('Edit Jadwal');
                $('#formJadwal').modal('show');
                $('#formJadwal input[name=id]').val(data.id);
                $('#formJadwal select[name=day_name]').val(data.day_name);
                $('#formJadwal input[name=start_time_at]').val(data.start_time_at);
                $('#formJadwal input[name=end_time_at]').val(data.end_time_at);
            }
        });
    }

    $('#formJadwal form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        if (save_method == 'POST') {
            url = '{{ route('dash.kehadiran.store') }}';
            console.log('masuksini');
        } else {
            url_raw = '{{ route('dash.kehadiran.update', ':id') }}';
            url = url_raw.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formJadwal form').serialize(),
            success: function (data) {
                $('#formJadwal').modal('hide');
                oTable.ajax.reload();
                $('#formJadwal form')[0].reset();
                toastr.success('Data berhasil diproses');
            },
            error: function () {
                alert('Gagal menambahkan data');
            }
        });
    });

    function hapusJadwal(id) {
        $('#hapusJadwal').modal('show');
        $('input[name=id]').val(id);
    }

    $('#hapusJadwal form').submit(function (e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var url = '{{ route('dash.kehadiran.destroy', ':id') }}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: "DELETE",
            data: $('#hapusJadwal form').serialize(),
            success: function (data) {
                $('#hapusJadwal').modal('hide');
                oTable.ajax.reload();
                toastr.success("Data berhasil dihapus", "Success");
            },
            error: function () {
                toastr.error('Gagal memproses data', 'Failed');
            }
        });
    })
</script>
@endpush
