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
            Daftar Jam Ajar
        </h3>
        <div class="card-options">
            <button type="button" id="newJamAjar" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarJamAjar">
            <thead>
                <tr>
                    <th>Jml Jam Ajar</th>
                    <th>Keterangan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('jam_ajar.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarJamAjar').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.jamAjar.datatable') }}',
            columns: [
                {data: 'jml'},
                {data: 'ket'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newJamAjar').click(function () {
            $('.modal-title').text('Tambah Jam Ajar');
            $('#formJamAjar').modal('show');
            $('input[name=_method]').val('POST');
            $('#formJamAjar form')[0].reset();
        });

        function editJamAjar(id) {
            var url = '{{ route('dash.jamAjar.edit', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#formJamAjar form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Jam Ajar');
                    $('#formJamAjar').modal('show');

                    $('input[name=id]').val(data.id);
                    $('input[name=ket]').val(data.ket);
                    $('input[name=jml]').val(data.jml);
                }
            });
        }

        $('#formJamAjar form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.jamAjar.store') }}';
            } else {
                url_raw = '{{ route('dash.jamAjar.update', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formJamAjar form').serialize(),
                success: function (data) {
                    $('#formJamAjar').modal('hide');
                    oTable.ajax.reload();
                },
                error: function () {
                    alert('Gagal menambahkan data');
                }
            });
        });

        function hapusJamAjar(id) {
            var url = '{{ route('dash.jamAjar.destroy', ':id') }}';
            url = url.replace(':id', id);
            $('#hapusJamAjar .modal-body').text('Yakin ingin menghapus?');
            $('#hapusJamAjar form').attr('action', url);
            $('#hapusJamAjar').modal('show');
        }

    // });
</script>
@endpush
