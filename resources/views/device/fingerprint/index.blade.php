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
            Check Sidik Jari Pegawai
        </h3>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="sidikJariTable">
            <thead>
                <tr>
                    <th>No Induk</th>
                    <th>Nama</th>
                    <th>Sidik Jari</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('device.fingerprint.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var oTable = $('#sidikJariTable').DataTable({
        serverSide: true,
        processing: true,
        // select: true,
        ajax: '{{ route('dash.fingerprint.datatable') }}',
        columns: [
            {data: 'no_induk'},
            {data: 'nama_lengkap'},
            {data: 'sidik_jari'},
            {data: 'actions', orderable: false, searchable: false}
        ]
    });

    function checkToDevice(id) {
        var url = '{{ route('dash.device.edit', ':id') }}';
        url = url.replace(':id', id);
        $('#loader-check'+id).addClass('btn-loading');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#loader-check').removeClass('btn-loading');
                toastr.success(data.message, "Success");
            }
        });
    }

    function uploadToDevice(id) {
        var url = '{{ route('dash.device.destroy', ':id') }}';
        url = url.replace(':id', id);
        $('#loader-upload' + id).addClass('btn-loading');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#loader-upload' + id).removeClass('btn-loading');
                toastr.success(data.message, "Success");
            }
        });
    }
</script>
@endpush
