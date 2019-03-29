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
                <h3 class="card-title" data-toggle="tooltip" title="test">Daftar Potongan</h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowra" id="pinjamanTable">
                    <thead>
                        <tr>
                            <th>No. Induk</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Potongan</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('potongan.modals')

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#pinjamanTable').DataTable({
            serverSide: true,
            processing: true,
            select: true,
            ajax: '{{ route('getPotongan') }}',
            columns: [
                {data: 'no_induk'},
                {data: 'nama_lengkap'},
                {data: 'jenis_potongan', orderable: false, searchable: false},
                {data: 'actions', orderable: false, searchable: false}
            ],
            columnDefs: [
                {
                    'targets': 3,
                    'className': 'text-right'
                }
            ]
        });
    });

    $('body').tooltip({selector: '[data-toggle="tooltip"]'});

    function tambahForm(id, name) {
        $('.modal-title').text('Tambah Potongan ' + name);
        $('#modalForm form').attr('action', '{{ route('storePotongan') }}');
        $('input[name=id]').val(id);
        $('#modalForm').modal('show');
        $('#modalForm form')[0].reset();
    }

    function editForm(id, name) {
        var url = '{{ route("editPotongan", ":id") }}';
        url = url.replace(':id', id);
        var url2 = '{{ route("updatePotongan", ":id") }}';
        url2 = url2.replace(':id', id);
        $('#modalForm form').attr('action', url2);
        $('input[name=_method]').val('PUT');
        $('.modal-title').text('Edit potongan ' + name);
        $('#modalForm form')[0].reset();
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('input[name=nama_potongan]').val(data.nama_potongan);
                $('input[name=jumlah_potongan]').val(data.jumlah_potongan);
                $('#modalForm').modal('show');
            },
            error: function() {
                alert('Data tidak ditemukan');
            }
        });
    }

    function deleteModal(id, name, name_id) {
        var url = '{{ route("editPotongan", ":id") }}';
        url = url.replace(':id', id);
        var url_delete = '{{ route("detachPotongan", ["id" => ":id", "name_id" => ":name_id"]) }}';
        url_delete = url_delete.replace(':id', id);
        url_delete = url_delete.replace(':name_id', name_id);
        $('.modal-title').text('Warning!');
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.modal-body').html('Yakin ingin menghapus potongan <strong>' + data.nama_potongan + '</strong> dari <strong>' + name + '</strong>');
                $('#modalDelete form').attr('action', url_delete);
                $('#modalDelete').modal('show');
            },
            error: function() {
                alert('Data tidak ditemukan');
            }
        });

    }
</script>
@endpush
