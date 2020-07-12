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
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"></button>
        {{$message}}
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"></button>
        {{$message}}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            Daftar Cuti
            <div class="card-options">
                <a class="btn btn-info" href="{{ route('profile.createCuti') }}"><i class="fe fe-plus"></i> Request
                    Cuti</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowra" id="cutiTable">
                <thead>
                    <tr>
                        <th>Tgl Request</th>
                        <th>Masa Cuti</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#cutiTable').DataTable({
        serverSide: true,
        processing: true,
        select: true,
        ajax: "{{ route('profile.getCuti', $id) }}",
        columns: [
            {data: 'tgl_request'},
            {data: 'progress'},
            {data: 'status'}
        ],
        order: [ [0, 'asc'] ],
        columnDefs: [
            { className: 'text-center', targets: [2] }
        ]
    });
</script>
@endpush
