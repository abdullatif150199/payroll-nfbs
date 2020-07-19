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
            Daftar Status Kerja
        </h3>
        <div class="card-options">
            <button type="button" id="newStatusKerja" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarStatusKerja">
            <thead>
                <tr>
                    <th>Status Kerja</th>
                    <th>Persentase Gaji</th>
                    <th>Jml peserta</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('status_kerja.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarStatusKerja').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.statusKerja.datatable') }}',
            columns: [
                {data: 'nama_status_kerja'},
                {data: 'persentase'},
                {data: 'jml_peserta'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newStatusKerja').click(function () {
            $('.modal-title').text('Create Status Kerja');
            $('#formStatusKerja').modal('show');
            $('input[name=_method]').val('POST');
            $('#formStatusKerja form')[0].reset();
        });

        function editStatusKerja(id) {
            var url = '{{ route('dash.statusKerja.edit', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#formStatusKerja form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Status Kerja');
                    $('#formStatusKerja').modal('show');

                    $('input[name=id]').val(data.id);
                    $('input[name=nama_status_kerja]').val(data.nama_status_kerja);
                    $('input[name=persentase_gaji_pokok]').val(data.to_persen);
                }
            });
        }

        $('#formStatusKerja form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.statusKerja.store') }}';
            } else {
                url_raw = '{{ route('dash.statusKerja.update', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formStatusKerja form').serialize(),
                success: function (data) {
                    $('#formStatusKerja').modal('hide');
                    oTable.ajax.reload();
                },
                error: function () {
                    alert('Gagal menambahkan data');
                }
            });
        });

        function hapusStatusKerja(id) {
            var url = '{{ route('dash.statusKerja.destroy', ':id') }}';
            url = url.replace(':id', id);
            $('#hapusStatusKerja .modal-body').text('Yakin ingin menghapus?');
            $('#hapusStatusKerja form').attr('action', url);
            $('#hapusStatusKerja').modal('show');
        }

    // });
</script>
@endpush
