@extends('layouts.profile')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
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
<div class="col-lg-8">
    @if($message = session('success'))
    <div class="alert alert-success alert-dismissible">
        <button data-dismiss="alert" class="close"></button>
        <strong>{!! $message !!}</strong>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            Daftar Lembur
            <div class="card-options">
                <button type="button" id="newLembur" class="btn btn-primary">
                    <i class="fe fe-plus"></i> Ajukan Lembur
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table" id="lemburTable">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Tarif</th>
                        <th>Jml Jam</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@include('profile.lembur.modals')

@endsection

@push('scripts')
<script>
    oTable = $('#lemburTable').DataTable({
        serverSide: true,
        processing: true,
        ajax: "{{ route('profile.lembur.datatable', $id) }}",
        columns: [
            {data: 'tanggal'},
            {data: 'total_tarif'},
            {data: 'jumlah_jam'},
            {data: 'actions', orderable:false, searchable:false}
        ],
        order: [
            [0, 'desc']
        ]
    });

    $('.edit-lembur').click(function () {
        alert('buton edit diklik');
    });

    $('#newLembur').click(function () {
        $('.modal-title').text('Buat Lembur');
        $('#formLembur').modal('show');
        $('input[name=_method]').val('POST');
        $('#formLembur form')[0].reset();
    });

    function editLembur(id) {
        var url = '{{ route('profile.lembur.edit', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('#formLembur form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('.modal-title').text('Edit Lembur');
                $('#formLembur').modal('show');
                var tgl = data.date;
                var arr = tgl.split("-");
                $('select[name=day]').val(arr[2]);
                $('select[name=month]').val(arr[1]);
                $('select[name=year]').val(arr[0]);
                $('input[name=id]').val(data.id);
                $('input[name=jumlah_jam]').val(data.jumlah_jam);
                $('select[name=type]').val(data.type);
                $('input[name=keterangan]').val(data.keterangan);
            }
        });
    }

    $('#formLembur form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        if (save_method == 'POST') {
            url = '{{ route('profile.lembur.store') }}';
        } else {
            url_raw = '{{ route('profile.lembur.update', ':id') }}';
            url = url_raw.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formLembur form').serialize(),
            success: function (data) {
                $('#formLembur').modal('hide');
                oTable.ajax.reload();
            },
            error: function () {
                alert('Gagal menambahkan data');
            }
        });
    });

    function hapusLembur(id) {
        var url = '{{ route('profile.lembur.destroy', ':id') }}';
        url = url.replace(':id', id);
        $('#hapusLembur .modal-body').text('Yakin ingin menghapus?');
        $('#hapusLembur form').attr('action', url);
        $('#hapusLembur').modal('show');
    }
</script>
@endpush
