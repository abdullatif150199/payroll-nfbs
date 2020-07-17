@extends('layouts.main')
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
                <h3 class="card-title">Daftar Cuti</h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowra" id="cutiTable">
                    <thead>
                        <tr>
                            <th>No. Induk</th>
                            <th>Nama Lengkap</th>
                            <th>JK</th>
                            <th>Unit</th>
                            <th>Masa Cuti</th>
                            <th></th>
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
        $('#cutiTable').DataTable({
            serverSide: true,
            processing: true,
            select: true,
            ajax: '{{ route('dash.cuti.datatable') }}',
            columns: [
                {data: 'no_induk'},
                {data: 'nama_lengkap'},
                {data: 'jenis_kelamin'},
                {data: 'unit'},
                {data: 'progress'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
