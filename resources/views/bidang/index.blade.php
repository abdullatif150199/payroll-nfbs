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
            Daftar Departemen
        </h3>
        <div class="card-options">
            <button type="button" id="newBidang" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarBidang">
            <thead>
                <tr>
                    <th>Nama Departemen</th>
                    <th>Jml Peserta</th>
                    <th>Jml Bidang</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('bidang.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarBidang').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.bidang.datatable') }}',
            columns: [
                {data: 'nama_bidang'},
                {data: 'jml_peserta'},
                {data: 'jml_unit'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newBidang').click(function () {
            $('.modal-title').text('Create Departemen');
            $('#formBidang').modal('show');
            $('input[name=_method]').val('POST');
            $('#formBidang form')[0].reset();
        });

        function editBidang(id) {
            var url = '{{ route('dash.bidang.edit', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#submit').text('Update');
            $('#formBidang form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Departemen');
                    $('#formBidang').modal('show');

                    $('input[name=id]').val(data.id);
                    $('input[name=nama_bidang]').val(data.nama_bidang);
                }
            });
        }

        $('#formBidang form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.bidang.store') }}';
            } else {
                url_raw = '{{ route('dash.bidang.update', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formBidang form').serialize(),
                success: function (data) {
                    $('#formBidang').modal('hide');
                    oTable.ajax.reload();
                    toastr.success(data.message, "Success");
                },
                error: function () {
                    toastr.success("Gagal menambahkan data", "Success");
                }
            });
        });

        function hapusBidang(id) {
            $('input[name=id]').val(id);
            $('#hapusBidang .modal-body').text('Yakin ingin menghapus?');
            $('#hapusBidang').modal('show');
        }

        $('#hapusBidang form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var url = '{{ route('dash.bidang.destroy', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "DELETE",
                success: function (data) {
                    $('#hapusBidang').modal('hide');
                    oTable.ajax.reload();
                    if (data.status != 200) {
                        toastr.error(data.message, "Failed");
                    } else {
                        toastr.success(data.message, "Success");
                    }
                },
                error: function () {
                    toastr.error('Gagal memproses data', 'Failed');
                }
            });
        });

    // });
</script>
@endpush
