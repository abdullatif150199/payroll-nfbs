@extends('layouts.main')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">
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
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form class="form-inline" action="{{ route('dash.kehadiran.datatable') }}" method="post">
                    <label for="month" class="mr-sm-3">Dari</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" name="dari_tanggal" class="form-control datepicker"
                                onchange="$('#kehadiranTable').DataTable().draw()">
                        </div>
                    </div>
                    {{-- BBBBBBBBB --}}
                    <label for="month" class="ml-sm-3 mr-sm-3">Sampai</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" name="sampai_tanggal" class="form-control datepicker"
                                onchange="$('#kehadiranTable').DataTable().draw()">
                        </div>
                    </div>
                    {{-- unit --}}
                    <label for="month" class="ml-sm-3 mr-sm-3">Bidang</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <select name="bidang" class="form-control"
                                onchange="$('#kehadiranTable').DataTable().draw()">
                                <option value="">Nama Bidang</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table"
                    id="kehadiranTable">
                    <thead>
                        <tr>
                            <th class="w-1">No. Induk</th>
                            <th>Nama Lengkap</th>
                            <th>Jml Jam</th>
                            <th class="text-center">Persentase</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('kehadiran.modals')

@endsection

@push('scripts')
<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
<script>
    $('.datepicker').datetimepicker({
        timepicker:false,
        format: 'Y-m-d'
    });

    var oTable = $('#kehadiranTable').DataTable({
        serverSide: true,
        processing: true,
        select: true,
        ajax: {
            url: '{{ route('dash.kehadiran.pilihan') }}',
            data: function (d) {
                d.dari_tanggal = $('input[name=dari_tanggal]').val();
                d.sampai_tanggal = $('input[name=sampai_tanggal]').val();
            }
        },
        columns: [
            {data: 'no_induk'},
            {data: 'nama_lengkap'},
            {data: 'jumlah_jam', searchable: false, orderable: false},
            {data: 'persentase', searchable: false, orderable: false}
        ]
    });

    function editKehadiran(id) {
        var url = '{{ route('dash.kehadiran.edit', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('#formKehadiran form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                if (data.tipe == 'shift') {
                    $('.shift').hide();
                } else {
                    $('.shift').show();
                }

                $('.modal-title').text('Edit Kehadiran');
                $('#formKehadiran').modal('show');
                $('input[name=id]').val(data.id);
                $('input[name=jam_masuk]').val(data.jam_masuk);
                $('input[name=jam_istirahat]').val(data.jam_istirahat);
                $('input[name=jam_kembali]').val(data.jam_kembali);
                $('input[name=jam_pulang]').val(data.jam_pulang);
            }
        });
    }

    $('#formKehadiran form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        url_raw = '{{ route('dash.kehadiran.update', ':id') }}';
        url = url_raw.replace(':id', id);

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formKehadiran form').serialize(),
            success: function (data) {
                $('#formKehadiran').modal('hide');
                oTable.ajax.reload();
            },
            error: function () {
                alert('Gagal menambahkan data');
            }
        });
    });

</script>
@endpush
