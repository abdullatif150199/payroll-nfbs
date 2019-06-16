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
                            <th>Gaji Pokok</th>
                            <th>Lembur</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
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
            ajax: '{{ route('getGolongan') }}',
            columns: [
                {data: 'kode_golongan'},
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
        });

        function editGolongan(id) {
            var url = '{{ route('editGolongan', ':id') }}';
            url = url.replace(':id', id);
            $('input[name=_method]').val('PUT');
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
                url = '{{ route('storeGolongan') }}';
            } else {
                url_raw = '{{ route('updateGolongan', ':id') }}';
                url = url_raw.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#formGolongan form').serialize(),
                success: function (data) {
                    $('#formGolongan').modal('hide');
                    oTable.ajax.reload();
                },
                error: function () {
                    alert('Gagal menambahkan data');
                }
            });
        });

    // });
</script>
@endpush
