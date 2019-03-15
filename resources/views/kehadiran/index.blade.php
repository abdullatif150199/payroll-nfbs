@extends('tabler::layouts.main')
@section('title', 'Kehadiran | ' . config('tabler.suffix'))
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
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Hadir</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table" id="kehadiranTable">
                    <thead>
                        <tr>
                            <th class="w-1">No. Induk</th>
                            <th>Nama Lengkap</th>
                            <th>Masuk</th>
                            <th>Istirahat</th>
                            <th>Kembali</th>
                            <th>Pulang</th>
                            <th>Jml Jam</th>
                            <th>Jml Jam ngajar</th>
                            <th class="text-center"><i class="icon-settings"></i></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#kehadiranTable').DataTable({
        serverSide: true,
        processing: true,
        select: true,
        ajax: '{{ route('getKehadiran') }}',
        columns: [
            {data: 'no_induk'},
            {data: 'nama_lengkap'},
            {data: 'jam_masuk'},
            {data: 'jam_istirahat'},
            {data: 'jam_kembali'},
            {data: 'jam_pulang'},
            {data: 'jumlah_jam'},
            {data: 'jumlah_jam_ngajar'},
            {data: 'actions', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
