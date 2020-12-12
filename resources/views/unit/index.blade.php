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
            Daftar Unit
        </h3>
        <div class="card-options">
            <button type="button" id="newUnit" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarUnit">
            <thead>
                <tr>
                    <th>Nama Unit</th>
                    <th>Jml Peserta</th>
                    <th>Bidang</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('unit.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarUnit').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.unit.datatable') }}',
            columns: [
                {data: 'nama_unit'},
                {data: 'jml_peserta'},
                {data: 'bidang'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newUnit').click(function () {
            $('.modal-title').text('Create Unit');
            $('#formUnit').modal('show');
            $('input[name=_method]').val('POST');
            $('#formUnit form')[0].reset();
        });

        function editUnit(id) {
            var url = '{{ route('dash.unit.edit', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#formUnit form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Unit');
                    $('#formUnit').modal('show');

                    $('input[name=id]').val(data.id);
                    $('input[name=bidang_id]').val(data.bidang_id);
                    $('input[name=nama_unit]').val(data.nama_unit);
                }
            });
        }

        $('#formUnit form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.unit.store') }}';
            } else {
                url_raw = '{{ route('dash.unit.update', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formUnit form').serialize(),
                success: function (data) {
                    $('#formUnit').modal('hide');
                    oTable.ajax.reload();
                },
                error: function () {
                    alert('Gagal menambahkan data');
                }
            });
        });

        function hapusUnit(id) {
            var url = '{{ route('dash.unit.destroy', ':id') }}';
            url = url.replace(':id', id);
            $('#hapusUnit .modal-body').text('Yakin ingin menghapus?');
            $('#hapusUnit form').attr('action', url);
            $('#hapusUnit').modal('show');
        }

    // });
</script>
@endpush
