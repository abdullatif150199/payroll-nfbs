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
            Daftar Status Keluarga
        </h3>
        <div class="card-options">
            <button type="button" id="newStatusKeluarga" class="btn btn-primary"><i class="fe fe-plus"></i>
                Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarStatusKeluarga">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Persentase tunjangan</th>
                    <th>Jml peserta</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('status_keluarga.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarStatusKeluarga').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.statusKeluarga.datatable') }}',
            columns: [
                {data: 'status'},
                {data: 'persentase'},
                {data: 'jml_peserta'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newStatusKeluarga').click(function () {
            $('.modal-title').text('Create Status Keluarga');
            $('#formStatusKeluarga').modal('show');
            $('input[name=_method]').val('POST');
            $('#formStatusKeluarga form')[0].reset();
        });

        function editStatusKeluarga(id) {
            var url = '{{ route('dash.statusKeluarga.edit', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#formStatusKeluarga form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Status Keluarga');
                    $('#formStatusKeluarga').modal('show');

                    $('input[name=id]').val(data.id);
                    $('input[name=status]').val(data.status);
                    $('input[name=persen]').val(data.to_persen);
                }
            });
        }

        $('#formStatusKeluarga form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.statusKeluarga.store') }}';
            } else {
                url_raw = '{{ route('dash.statusKeluarga.update', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formStatusKeluarga form').serialize(),
                success: function (data) {
                    $('#formStatusKeluarga').modal('hide');
                    oTable.ajax.reload();
                },
                error: function () {
                    alert('Gagal menambahkan data');
                }
            });
        });

        function hapusStatusKeluarga(id) {
            var url = '{{ route('dash.statusKeluarga.destroy', ':id') }}';
            url = url.replace(':id', id);
            $('#hapusStatusKeluarga .modal-body').text('Yakin ingin menghapus?');
            $('#hapusStatusKeluarga form').attr('action', url);
            $('#hapusStatusKeluarga').modal('show');
        }

    // });
</script>
@endpush
