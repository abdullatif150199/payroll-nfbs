@extends('layouts.main')
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

    .hovertip {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
    }

    .hovertip .hovertiptext {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        top: -5px;
        left: 110%;
    }

    .hovertip .hovertiptext::after {
        content: "";
        position: absolute;
        top: 50%;
        right: 100%;
        margin-top: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent black transparent transparent;
    }

    .hovertip:hover .hovertiptext {
        visibility: visible;
    }
</style>
@endpush
@section('content')
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <form class="form-inline mb-0" action="{{ route('dash.karyawan.datatable') }}" method="post">
                        <label for="status_kerja" class="mr-sm-3">Daftar Pegawai </label>
                        <div class="row gutters-xs mr-2">
                            <div class="col">
                                <select name="statuskerja" class="form-control"
                                    onchange="$('#karyawanTable').DataTable().draw()">
                                    <option value="">Aktif</option>
                                    @foreach ($status_kerja as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_status_kerja }}</option>
                                    @endforeach
                                    <option value="berhenti">Resign/Berhenti</option>
                                </select>
                            </div>
                        </div>
                        <label for="status_kerja" class="mr-sm-3">Bidang </label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <select name="bidang" class="form-control"
                                    onchange="$('#karyawanTable').DataTable().draw()">
                                    <option value="">Semua bidang</option>
                                    @foreach ($bidang as $bid)
                                    <option value="{{ $bid->id }}">{{ $bid->nama_bidang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </h3>
                @can('tambah pegawai')
                <div class="card-options">
                    <a href="#modalCreate" data-toggle="modal" data-backdrop="static" class="btn btn-primary"><i
                            class="fe fe-plus"></i>
                        Tambah</a>
                </div>
                @endcan
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
                            <th>Status Kerja</th>
                            <th></th>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        var oTable = $('#karyawanTable').DataTable({
            serverSide: true,
            processing: true,
            select: true,
            ajax: {
                url: '{{ route('dash.karyawan.datatable') }}',
                data: function (d) {
                    d.statuskerja = $('select[name=statuskerja]').val();
                    d.bidang = $('select[name=bidang]').val();
                }
            },
            columns: [
                {data: 'no_induk'},
                {data: 'nama_lengkap'},
                {data: 'jenis_kelamin'},
                {data: 'jabatan'},
                {data: 'golongan'},
                {data: 'unit'},
                {data: 'status_kerja'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });

        $('.selectize-select').selectize({
            maxItems: 3
        });
    });

    function editKaryawan(id) {
        $('#formEdit')[0].reset();
        var url = '{{ route("dash.karyawan.edit", ":id") }}';
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(JSON.stringify(data.bidang, null, 2));
                var url_update = '{{ route("dash.karyawan.update", ":id") }}';
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
                if (data.contract_expired !== null) {
                    $('#ak_day').val(data.contract_expired.substr(-2,2));
                    $('#ak_month').val(data.contract_expired.substr(5,2));
                    $('#ak_year').val(data.contract_expired.substr(0,4));
                }

                if (data.tanggal_keluar !== null) {
                    $('#tk_day').val(data.tanggal_keluar.substr(-2,2));
                    $('#tk_month').val(data.tanggal_keluar.substr(5,2));
                    $('#tk_year').val(data.tanggal_keluar.substr(0,4));
                }
                $('#golongan').val(data.golongan_id);
                $('#jabatan')[0].selectize.clear();
                $.each(data.jabatan, function(k,v) {
                    // console.log($('#jabatan').val(v.id));
                    var $select = $('#jabatan');
                    var selectize = $select[0].selectize;
                    selectize.addItem(v.id);
                });
                $('#bidang')[0].selectize.clear();
                $.each(data.bidang, function(k,v) {
                    // console.log($('#bidang').val(v.id));
                    var $select = $('#bidang');
                    var selectize = $select[0].selectize;
                    selectize.addItem(v.id);
                });
                $('#unit')[0].selectize.clear();
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
                $('#kelompok_kerja').val(data.kelompok_kerja_id);
                $('#jam_perpekan').val(data.jam_perpekan_id);
                $('#status').val(data.status);
                $('#modalEdit').modal('show');
            },
            error: function() {
                alert('Data tidak ditemukan');
            }
        });
    }

    function resignKaryawan(id, name) {
        var url = '{{ route("dash.karyawan.resign", ":id") }}';
        url = url.replace(':id', id);
        $('#resignKaryawan .modal-body').text('Apakah benar ' + name + ' berhenti kerja?');
        $('#resignKaryawan form').attr('action', url);
        $('#resignKaryawan').modal('show');
    }
</script>
@endpush
