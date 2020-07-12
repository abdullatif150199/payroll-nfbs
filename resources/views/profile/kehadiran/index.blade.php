@extends('layouts.profile')
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
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            Daftar Kehadiran
            <div class="card-options">
                <a class="btn btn-info" href="?list=pilihan"><i class="fe fe-list"></i> Persentase Kehadiran</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table"
                id="kehadiranTable">
                <thead>
                    <tr>
                        <th class="w-1">Tanggal</th>
                        <th>Masuk</th>
                        <th>Istirahat</th>
                        <th>Kembali</th>
                        <th>Pulang</th>
                        <th>Jml Jam</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // $(document).ready(function() {
    $('#kehadiranTable').DataTable({
        serverSide: true,
        processing: true,
        select: true,
        ajax: "{{ route('profile.getKehadiran', $id) }}",
        columns: [
            {data: 'tanggal'},
            {data: 'jam_masuk'},
            {data: 'jam_istirahat'},
            {data: 'jam_kembali'},
            {data: 'jam_pulang'},
            {data: 'jumlah_jam'}
        ],
        order: [[ 0, 'desc' ]]
    });
// });
</script>
@endpush
