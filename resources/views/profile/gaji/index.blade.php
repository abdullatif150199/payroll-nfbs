@extends('layouts.profile')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
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
            Daftar Gaji
        </div>
        <div class="table-responsive">
            <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table" id="gajiTable">
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Gaji Akhir</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#gajiTable').DataTable({
        serverSide: true,
        processing: true,
        ajax: "{{ route('profile.gaji.datatable', $id) }}",
        columns: [
            {data: 'bulan'},
            {data: 'gaji_akhir'},
            {data: 'actions', orderable: false, searchable: false}
        ],
        order: [[ 0, 'desc' ]]
    });
</script>
@endpush
