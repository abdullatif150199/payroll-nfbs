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
            Daftar Tarif Lembur (berlaku jika melebihi maks jam lembur di hari libur)
        </h3>
        <div class="card-options">
            <button type="button" id="new-tarif-lembur" class="btn btn-primary"><i class="fe fe-plus"></i>
                Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftar-golongan">
            <thead>
                <tr>
                    <th>Gol</th>
                    <th>Kelompok</th>
                    <th>Tarif</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('tarif_lembur.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftar-golongan').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.tariflembur.datatable') }}',
            columns: [
                {data: 'golongan'},
                {data: 'kelompok'},
                {data: 'tarif'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#new-tarif-lembur').click(function () {
            $('.modal-title').text('Create Tarif Lembur');
            $('#form-tarif-lembur').modal('show');
            $('input[name=_method]').val('POST');
            $('#form-tarif-lembur form')[0].reset();
        });

        function editTarifLembur(id) {
            var url = '{{ route('dash.tariflembur.edit', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#submit').text('Update');
            $('#form-tarif-lembur form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Tarif Lembur');
                    $('#form-tarif-lembur').modal('show');

                    $('input[name=id]').val(data.id);
                    $('select[name=golongan]').val(data.golongan);
                    $('select[name=kelompok]').val(data.kelompok);
                    $('input[name=tarif]').val(data.tarif);
                }
            });
        }

        $('#form-tarif-lembur form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.tariflembur.store') }}';
            } else {
                url_raw = '{{ route('dash.tariflembur.update', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#form-tarif-lembur form').serialize(),
                success: function (data) {
                    $('#form-tarif-lembur').modal('hide');
                    oTable.ajax.reload();
                    if (data.status != 200) {
                        toastr.error(data.message, "Failed");
                    } else {
                        toastr.success(data.message, "Success");
                    }
                },
                error: function () {
                    toastr.error('Gagal menambahkan data', 'Failed');
                }
            });
        });

        function hapusTarifLembur(id) {
            $('input[name=id]').val(id);
            $('#hapus-tarif-lembur .modal-body').text('Yakin ingin menghapus?');
            $('#hapus-tarif-lembur').modal('show');
        }

        $('#hapus-tarif-lembur form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var url = '{{ route('dash.tariflembur.destroy', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "DELETE",
                success: function (data) {
                    $('#hapus-tarif-lembur').modal('hide');
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
