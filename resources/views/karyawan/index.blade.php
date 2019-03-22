@extends('tabler::layouts.main')
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
                <h3 class="card-title">Daftar Karyawan</h3>
                <div class="card-options">
                    <a href="#modalCreate" data-toggle="modal" data-backdrop="static" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowra" id="karyawanTable">
                    <thead>
                        <tr>
                            <th>No. Induk</th>
                            <th>Nama Lengkap</th>
                            <th>JK</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Bidang</th>
                            <th>No. HP</th>
                            <th>Status Kerja</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@include('karyawan.modals')

@push('scripts')
<script>
    $(document).ready(function() {
        $('#karyawanTable').DataTable({
            serverSide: true,
            processing: true,
            select: true,
            ajax: '{{ route('getKaryawan') }}',
            columns: [
                {data: 'no_induk'},
                {data: 'nama_lengkap'},
                {data: 'jenis_kelamin'},
                {data: 'jabatan'},
                {data: 'golongan'},
                {data: 'bidang'},
                {data: 'no_hp'},
                {data: 'status_kerja'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
