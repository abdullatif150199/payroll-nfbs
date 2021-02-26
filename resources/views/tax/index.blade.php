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
            Pajak
        </h3>
        <div class="card-options">
            <button type="button" id="newTax" class="btn btn-primary mr-2"><i class="fe fe-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowra" id="daftarTax">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>PTKP Pertahun</th>
                    <th>PTKP Perbulan</th>
                    <th>% PPH 21</th>
                    <th>% Biaya Jabatan</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('tax.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var oTable = $('#daftarTax').DataTable({
        serverSide: true,
        processing: true,
        ajax: '{{ route('dash.tax.datatable') }}',
        columns: [
            {data: 'kode'},
            {data: 'ptkp_pertahun'},
            {data: 'ptkp_perbulan'},
            {data: 'persentase_pph21'},
            {data: 'persentase_biaya_jabatan'},
            {data: 'actions', orderable: false, searchable: false}
        ]
    });

    $('#newTax').click(function () {
        $('.modal-title').text('Create Tax');
        $('#formTax').modal('show');
        $('input[name=_method]').val('POST');
        $('#formTax form')[0].reset();
    });

    function editTax(id) {
        var url = '{{ route('dash.tax.edit', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('input[name=id]').val(id);
        $('#formTax form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('.modal-title').text('Edit Pajak');
                $('#formTax').modal('show');

                $('input[name=kode]').val(data.kode);
                $('input[name=ptkp_pertahun]').val(data.ptkp_pertahun);
                $('input[name=ptkp_perbulan]').val(data.ptkp_perbulan);
                $('input[name=persentase_pph21]').val(data.persentase_pph21);
                $('input[name=persentase_biaya_jabatan]').val(data.persentase_biaya_jabatan);
            }
        });
    }

    $('#formTax form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        if (save_method == 'POST') {
            url = '{{ route('dash.tax.store') }}';
        } else {
            url_raw = '{{ route('dash.tax.update', ':id') }}';
            url = url_raw.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formTax form').serialize(),
            success: function (data) {
                $('#formTax').modal('hide');
                oTable.ajax.reload();
                toastr.success(data.message, "Success");
            },
            error: function () {
                toastr.error('Gagal memproses data', 'Failed');
            }
        });
    });

    function hapusTax(id) {
        $('#hapusTax').modal('show');
        $('input[name=id]').val(id);
    }

    $('#hapusTax form').submit(function (e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var url = '{{ route('dash.tax.destroy', ':id') }}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: "DELETE",
            success: function (data) {
                $('#hapusTax').modal('hide');
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
    })
</script>
@endpush
