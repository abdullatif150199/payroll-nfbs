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
            Daftar Jabatan
        </h3>
        <div class="card-options">
            <button type="button" id="newJabatan" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarJabatan">
            <thead>
                <tr>
                    <th>Nama Jabatan</th>
                    <th>Jml Peserta</th>
                    <th>Tunj Jabatan</th>
                    <th>Load</th>
                    <th>Maks Jam Lembur</th>
                    <th>No Kode</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('jabatan.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var oTable = $('#daftarJabatan').DataTable({
        serverSide: true,
        processing: true,
        // select: true,
        ajax: '{{ route('dash.jabatan.datatable') }}',
        columns: [
            {data: 'nama_jabatan'},
            {data: 'jml_peserta'},
            {data: 'tunjangan_jabatan'},
            {data: 'load'},
            {data: 'maksimal_jam'},
            {data: 'no_kode'},
            {data: 'actions', orderable: false, searchable: false}
        ]
    });
    // $('#select-form').submit(function(e) {
    //     oTable.draw();
    //     e.preventDefault();
    // });

    $('#newJabatan').click(function () {
        $('.modal-title').text('Tambah Jabatan');
        $('#formJabatan').modal('show');
        $('input[name=_method]').val('POST');
        $('#formJabatan form')[0].reset();
    });

    function editJabatan(id) {
        var url = '{{ route('dash.jabatan.edit', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('#formJabatan form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('.modal-title').text('Edit Jabatan');
                $('#formJabatan').modal('show');
                $('input[name=id]').val(data.id);
                $('input[name=nama_jabatan]').val(data.nama_jabatan);
                $('input[name=tunjangan_jabatan]').val(data.tunjangan_jabatan);
                $('input[name=load]').val(data.load);
                $('input[name=maksimal_jam]').val(data.maksimal_jam);
                $('input[name=no_kode]').val(data.no_kode);
            }
        });
    }

    $('#formJabatan form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        if (save_method == 'POST') {
            url = '{{ route('dash.jabatan.store') }}';
        } else {
            url_raw = '{{ route('dash.jabatan.update', ':id') }}';
            url = url_raw.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formJabatan form').serialize(),
            success: function (data) {
                $('#formJabatan').modal('hide');
                oTable.ajax.reload();
            },
            error: function () {
                alert('Gagal menambahkan data');
            }
        });
    });

    function hapusJabatan(id) {
        var url = '{{ route('dash.jabatan.destroy', ':id') }}';
        url = url.replace(':id', id);
        $('#hapusJabatan .modal-body').text('Yakin ingin menghapus?');
        $('#hapusJabatan form').attr('action', url);
        $('#hapusJabatan').modal('show');
    }
</script>
@endpush
