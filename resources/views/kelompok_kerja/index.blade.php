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
            Daftar Kelompok Kerja
        </h3>
        <div class="card-options">
            <button type="button" id="newKelompok" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarKelompok">
            <thead>
                <tr>
                    <th>Grade</th>
                    <th>Jml Peserta</th>
                    <th>Tunj Fungsional</th>
                    <th>No Kode/Induk</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('kelompok_kerja.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarKelompok').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.kelompokKerja.datatable') }}',
            columns: [
                {data: 'grade'},
                {data: 'peserta'},
                {data: 'persen'},
                {data: 'no_kode'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newKelompok').click(function () {
            $('.modal-title').text('Create Kelompok Kerja');
            $('#formKelompok').modal('show');
            $('input[name=_method]').val('POST');
            $('#formKelompok form')[0].reset();
        });

        function editKelompok(id) {
            var url = '{{ route('dash.kelompokKerja.edit', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#formKelompok form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Kelompok Kerja');
                    $('#formKelompok').modal('show');
                    console.log(data);
                    $('input[name=id]').val(data.id);
                    $('input[name=grade]').val(data.grade);
                    $('input[name=persen]').val(data.to_persen);
                    $('input[name=no_kode]').val(data.no_kode);
                    $('input[name=kinerja_normal]').val(data.kinerja_normal);
                }
            });
        }

        $('#formKelompok form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.kelompokKerja.store') }}';
            } else {
                url_raw = '{{ route('dash.kelompokKerja.update', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formKelompok form').serialize(),
                success: function (data) {
                    $('#formKelompok').modal('hide');
                    oTable.ajax.reload();
                },
                error: function () {
                    alert('Gagal menambahkan data');
                }
            });
        });

    // });
</script>
@endpush
