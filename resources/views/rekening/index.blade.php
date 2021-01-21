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
            Daftar Rekening Cover
        </h3>
        <div class="card-options">
            <button type="button" id="newRekening" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarRekening">
            <thead>
                <tr>
                    <th>Nama Bank</th>
                    <th>No. Rekening</th>
                    <th>Atas Nama</th>
                    <th>Keterangan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('rekening.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarRekening').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.rekening.datatable') }}',
            columns: [
                {data: 'bank'},
                {data: 'no_rekening'},
                {data: 'atas_nama'},
                {data: 'keterangan'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newRekening').click(function () {
            $('.modal-title').text('Create Rekening');
            $('#formRekening').modal('show');
            $('input[name=_method]').val('POST');
            $('#formRekening form')[0].reset();
        });

        function editRekening(id) {
            var url = '{{ route('dash.rekening.edit', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#submit').text('Update');
            $('#formRekening form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Rekening');
                    $('#formRekening').modal('show');

                    $('input[name=id]').val(data.id);
                    $('input[name=bank]').val(data.bank);
                    $('input[name=no_rekening]').val(data.no_rekening);
                    $('input[name=atas_nama]').val(data.atas_nama);
                    $('textarea[name=keterangan]').val(data.keterangan);
                }
            });
        }

        $('#formRekening form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.rekening.store') }}';
            } else {
                url_raw = '{{ route('dash.rekening.update', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formRekening form').serialize(),
                success: function (data) {
                    $('#formRekening').modal('hide');
                    oTable.ajax.reload();
                    toastr.success(data.message, "Success");
                },
                error: function () {
                    toastr.success("Gagal menambahkan data", "Success");
                }
            });
        });

        function hapusRekening(id) {
            $('input[name=id]').val(id);
            $('#hapusRekening .modal-body').text('Yakin ingin menghapus?');
            $('#hapusRekening').modal('show');
        }

        $('#hapusRekening form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var url = '{{ route('dash.rekening.destroy', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "DELETE",
                success: function (data) {
                    $('#hapusRekening').modal('hide');
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
