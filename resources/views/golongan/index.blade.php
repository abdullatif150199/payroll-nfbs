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
            Daftar Golongan
        </h3>
        <div class="card-options">
            <button type="button" id="newGolongan" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarGolongan">
            <thead>
                <tr>
                    <th>Gol</th>
                    <th>Jml Peserta</th>
                    <th>Gaji Pokok</th>
                    <th>Lembur</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('golongan.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
        var oTable = $('#daftarGolongan').DataTable({
            serverSide: true,
            processing: true,
            // select: true,
            ajax: '{{ route('dash.golongan.datatable') }}',
            columns: [
                {data: 'kode_golongan'},
                {data: 'peserta'},
                {data: 'gaji_pokok'},
                {data: 'lembur'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('#select-form').submit(function(e) {
        //     oTable.draw();
        //     e.preventDefault();
        // });

        $('#newGolongan').click(function () {
            $('.modal-title').text('Create Golongan');
            $('#formGolongan').modal('show');
            $('input[name=_method]').val('POST');
            $('#formGolongan form')[0].reset();
        });

        function editGolongan(id) {
            var url = '{{ route('dash.golongan.edit', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
            $('#submit').text('Update');
            $('#formGolongan form')[0].reset();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('.modal-title').text('Edit Golongan');
                    $('#formGolongan').modal('show');

                    $('input[name=id]').val(data.id);
                    $('input[name=kode_golongan]').val(data.kode_golongan);
                    $('input[name=gaji_pokok]').val(data.gaji_pokok);
                    $('input[name=lembur]').val(data.lembur);
                }
            });
        }

        $('#formGolongan form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var save_method = $('input[name=_method]').val();

            if (save_method == 'POST') {
                url = '{{ route('dash.golongan.store') }}';
            } else {
                url_raw = '{{ route('dash.golongan.update', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formGolongan form').serialize(),
                success: function (data) {
                    $('#formGolongan').modal('hide');
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

        function hapusGolongan(id) {
            $('input[name=id]').val(id);
            $('#hapusGolongan .modal-body').text('Yakin ingin menghapus?');
            $('#hapusGolongan').modal('show');
        }

        $('#hapusGolongan form').submit(function(e) {
            e.preventDefault();
            var id = $('input[name=id]').val();
            var url = '{{ route('dash.golongan.destroy', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "DELETE",
                success: function (data) {
                    $('#hapusGolongan').modal('hide');
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
