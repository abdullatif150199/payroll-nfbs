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
            Daftar Nilai Kinerja
        </h3>
        <div class="card-options">
            <button type="button" id="newNilaiKinerja" class="btn btn-primary"><i class="fe fe-plus"></i>
                Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarNilaiKinerja">
            <thead>
                <tr>
                    <th>Nilai</th>
                    <th>Minimal</th>
                    <th>Maksimal</th>
                    <th>Hasil yg diperoleh</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('nilai_kinerja.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarNilaiKinerja').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.getNilaiKinerja') }}',
            columns: [
                {data: 'nilai'},
                {data: 'min_persen'},
                {data: 'max_persen'},
                {data: 'result_persen'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newNilaiKinerja').click(function () {
            $('.modal-title').text('Create Nilai Kinerja');
            $('#formNilaiKinerja').modal('show');
            $('input[name=_method]').val('POST');
            $('#formNilaiKinerja form')[0].reset();
        });

        function editNilaiKinerja(id) {
            var url = '{{ route('dash.editNilaiKinerja', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#formNilaiKinerja form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Nilai Kinerja');
                    $('#formNilaiKinerja').modal('show');

                    $('input[name=id]').val(data.id);
                    $('input[name=nilai]').val(data.nilai);
                    $('input[name=min_persen]').val(data.to_min_persen);
                    $('input[name=max_persen]').val(data.to_max_persen);
                    $('input[name=result_persen]').val(data.to_result_persen);
                }
            });
        }

        $('#formNilaiKinerja form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            console.log(save_method);

            if (save_method == 'POST') {
                url = '{{ route('dash.storeNilaiKinerja') }}';
            } else {
                console.log('masuk sini')
                url_raw = '{{ route('dash.updateNilaiKinerja', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formNilaiKinerja form').serialize(),
                success: function (data) {
                    $('#formNilaiKinerja').modal('hide');
                    oTable.ajax.reload();
                },
                error: function () {
                    alert('Gagal menambahkan data');
                }
            });
        });

        function hapusNilaiKinerja(id) {
            var url = '{{ route("dash.hapusNilaiKinerja", ":id") }}';
            url = url.replace(':id', id);
            $('#hapusNilaiKinerja .modal-body').text('Yakin ingin menghapus?');
            $('#hapusNilaiKinerja form').attr('action', url);
            $('#hapusNilaiKinerja').modal('show');
        }

    // });
</script>
@endpush
