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
            Daftar Jam Perpekan
        </h3>
        <div class="card-options">
            <button type="button" id="newJamPerpekan" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarJamPerpekan">
            <thead>
                <tr>
                    <th>Keterangan</th>
                    <th>Jml Jam</th>
                    <th>Jml Hari Kerja</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('jam_perpekan.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarJamPerpekan').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.jamPerpekan.datatable') }}',
            columns: [
                {data: 'keterangan'},
                {data: 'jml_jam'},
                {data: 'jml_hari'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newJamPerpekan').click(function () {
            $('.modal-title').text('Create Jam Perpekan');
            $('#formJamPerpekan').modal('show');
            $('input[name=_method]').val('POST');
            $('#formJamPerpekan form')[0].reset();
        });

        function editJamPerpekan(id) {
            var url = '{{ route('dash.jamPerpekan.edit', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#formJamPerpekan form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Jam Perpekan');
                    $('#formJamPerpekan').modal('show');

                    $('input[name=id]').val(data.id);
                    $('input[name=keterangan]').val(data.keterangan);
                    $('input[name=jml_jam]').val(data.jml_jam);
                    $('input[name=jml_hari]').val(data.jml_hari);
                }
            });
        }

        $('#formJamPerpekan form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.jamPerpekan.store') }}';
            } else {
                url_raw = '{{ route('dash.jamPerpekan.update', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formJamPerpekan form').serialize(),
                success: function (data) {
                    $('#formJamPerpekan').modal('hide');
                    oTable.ajax.reload();
                },
                error: function () {
                    alert('Gagal menambahkan data');
                }
            });
        });

        function hapusJamPerpekan(id) {
            var url = '{{ route('dash.jamPerpekan.destroy', ':id') }}';
            url = url.replace(':id', id);
            $('#hapusJamPerpekan .modal-body').text('Yakin ingin menghapus?');
            $('#hapusJamPerpekan form').attr('action', url);
            $('#hapusJamPerpekan').modal('show');
        }

    // });
</script>
@endpush
