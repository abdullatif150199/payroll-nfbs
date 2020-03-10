@extends('tabler::layouts.setting')
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
            Bulk Upload
        </h3>
        <div class="card-options">
            <a href="#confirm" data-toggle="modal" class="btn btn-primary">
                <i class="fe fe-plus"></i> Tambah Data Dari Spreadsheet
            </a>
        </div>
    </div>
    @if (!empty($errorItems))
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowra" id="errorTable">
                <thead>
                    <tr>
                        <th>IP Server</th>
                        <th>Port Server</th>
                        <th>Serial Number</th>
                        <th>Tipe</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($errorItems as $item)
                        <tr>
                            <td>adgagag</td>
                            <td>adgagag</td>
                            <td>adgagag</td>
                            <td>adgagag</td>
                            <td>adgagag</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@include('bulk.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#errorTable').DataTable();
</script>
@endpush
