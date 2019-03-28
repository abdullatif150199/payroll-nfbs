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
                            <th>Gol</th>
                            <th>Unit</th>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
                {data: 'unit'},
                {data: 'no_hp'},
                {data: 'status_kerja'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });

        $('.selectize-select').selectize({
            maxItems: 3
        });
    });

    function editKaryawan(id) {
        var url = '{{ route("editKaryawan", ":id") }}';
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(JSON.stringify(data.bidang, null, 2));
                var url_update = '{{ route("updateKaryawan", ":id") }}';
                url = url_update.replace(':id', id);
                $('#formEdit').attr('action', url);
                $('#nama_lengkap').val(data.nama_lengkap);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#day').val(data.tanggal_lahir.substr(-2,2));
                $('#month').val(data.tanggal_lahir.substr(5,2));
                $('#year').val(data.tanggal_lahir.substr(0,4));
                $('#pendidikan_terakhir').val(data.pendidikan_terakhir);
                $('#jurusan').val(data.jurusan);
                $('#tahun_lulus').val(data.tahun_lulus);
                $('#nama_pendidikan').val(data.nama_pendidikan);
                $('select[name=status_pernikahan').val(data.status_pernikahan);
                $('#no_hp').val(data.no_hp);
                $('#alamat').val(data.alamat);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tm_day').val(data.tanggal_masuk.substr(-2,2));
                $('#tm_month').val(data.tanggal_masuk.substr(5,2));
                $('#tm_year').val(data.tanggal_masuk.substr(0,4));
                if (data.tanggal_keluar !== null) {
                    $('#tk_day').val(data.tanggal_keluar.substr(-2,2));
                    $('#tk_month').val(data.tanggal_keluar.substr(5,2));
                    $('#tk_year').val(data.tanggal_keluar.substr(0,4));
                }
                $('#golongan').val(data.golongan_id);
                $('#jabatan').val(data.jabatan_id);
                $.each(data.bidang, function(k,v) {
                    // console.log($('#bidang').val(v.id));
                    var $select = $('#bidang');
                    var selectize = $select[0].selectize;
                    selectize.addItem(v.id);
                });
                $.each(data.unit, function(k,v) {
                    // console.log($('#unit').val(v.id));
                    var $select = $('#unit');
                    var selectize = $select[0].selectize;
                    selectize.addItem(v.id);
                });
                $('#nama_bank').val(data.nama_bank);
                $('#no_rekening').val(data.no_rekening);
                $('#rekening_atas_nama').val(data.rekening_atas_nama);
                $('#status_kerja').val(data.status_kerja_id);
                $('#status').val(data.status);
                $('#modalEdit').modal('show');
            },
            error: function() {
                alert('Data tidak ditemukan');
            }
        });
    }
</script>
@endpush
