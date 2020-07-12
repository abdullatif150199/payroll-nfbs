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
            Daftar Persentase Kinerja
        </h3>
        <div class="card-options">
            <button type="button" id="newPersentaseKinerja" class="btn btn-primary"><i class="fe fe-plus"></i>
                Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarPersentaseKinerja">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Persentase</th>
                    <th>Jml Peserta</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('persentase_kinerja.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarPersentaseKinerja').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.getPersentaseKinerja') }}',
            columns: [
                {data: 'title'},
                {data: 'persen'},
                {data: 'jml_peserta'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newPersentaseKinerja').click(function () {
            $('.modal-title').text('Create Persentase Kinerja');
            $('#formPersentaseKinerja').modal('show');
            $('input[name=_method]').val('POST');
            $('#formPersentaseKinerja form')[0].reset();
        });

        function editPersentaseKinerja(id) {
            var url = '{{ route('dash.editPersentaseKinerja', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#formPersentaseKinerja form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Persentase Kinerja');
                    $('#formPersentaseKinerja').modal('show');

                    $('input[name=id]').val(data.id);
                    $('input[name=title]').val(data.title);
                    $('input[name=persen]').val(data.to_persen);
                }
            });
        }

        $('#formPersentaseKinerja form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.storePersentaseKinerja') }}';
            } else {
                url_raw = '{{ route('dash.updatePersentaseKinerja', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formPersentaseKinerja form').serialize(),
                success: function (data) {
                    $('#formPersentaseKinerja').modal('hide');
                    oTable.ajax.reload();
                },
                error: function () {
                    alert('Gagal menambahkan data');
                }
            });
        });

        function hapusPersentaseKinerja(id) {
            var url = '{{ route("dash.hapusPersentaseKinerja", ":id") }}';
            url = url.replace(':id', id);
            $('#hapusPersentaseKinerja .modal-body').text('Yakin ingin menghapus?');
            $('#hapusPersentaseKinerja form').attr('action', url);
            $('#hapusPersentaseKinerja').modal('show');
        }

    // });
</script>
@endpush
