@extends('layouts.main')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">
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
                <form class="form-inline" action="{{ route('dash.kehadiran.datatable') }}" method="post">
                    <label for="month" class="mr-sm-3">Tanggal</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <select name="day" class="form-control custom-select"
                                onchange="$('#apelTable').DataTable().draw()">
                                <option value="">Tahun</option>
                                @for ($i=1; $i <= 31; $i++) <option {{ date('d') == $i ? 'selected' : ''}}
                                    value="{{$i}}">{{$i}}
                                    </option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select name="month" class="form-control custom-select"
                                onchange="$('#apelTable').DataTable().draw()">
                                <option value="">Bulan</option>
                                <option {{ date('m') == '01' ? 'selected' : ''}} value="01">Januari</option>
                                <option {{ date('m') == '02' ? 'selected' : ''}} value="02">Februari</option>
                                <option {{ date('m') == '03' ? 'selected' : ''}} value="03">Maret</option>
                                <option {{ date('m') == '04' ? 'selected' : ''}} value="04">April</option>
                                <option {{ date('m') == '05' ? 'selected' : ''}} value="05">Mei</option>
                                <option {{ date('m') == '06' ? 'selected' : ''}} value="06">Juni</option>
                                <option {{ date('m') == '07' ? 'selected' : ''}} value="07">Juli</option>
                                <option {{ date('m') == '08' ? 'selected' : ''}} value="08">Augustus</option>
                                <option {{ date('m') == '09' ? 'selected' : ''}} value="09">September</option>
                                <option {{ date('m') == '10' ? 'selected' : ''}} value="10">Oktober</option>
                                <option {{ date('m') == '11' ? 'selected' : ''}} value="11">November</option>
                                <option {{ date('m') == '12' ? 'selected' : ''}} value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="year" class="form-control custom-select"
                                onchange="$('#apelTable').DataTable().draw()">
                                <option value="">Tahun</option>
                                @for ($i=2018; $i <= date('Y'); $i++) <option {{ date('Y') == $i ? 'selected' : ''}}
                                    value="{{$i}}">
                                    {{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                    <label for="month" class="ml-sm-3 mr-sm-3">Departemen</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <select name="bidang" class="form-control" onchange="$('#apelTable').DataTable().draw()">
                                <option value="">Semua Departemen</option>
                                @foreach ($bidang as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
                <div class="card-options">
                    <a class="btn btn-primary mr-2" href="{{ route('dash.kehadiran') }}?list=jadwal-apel">
                        <i class="fe fe-calendar"></i> Jadwal Apel
                    </a>
                    <a class="btn btn-primary mr-2" href="#unduhScanlog" data-toggle="modal"><i class="fe fe-download"></i> Unduh</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table"
                    id="apelTable">
                    <thead>
                        <tr>
                            <th class="w-1">No. Induk</th>
                            <th>Nama Lengkap</th>
                            <th>Jam Masuk</th>
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unduhScanlog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Unduh Data Apel</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post" action="{{ route('dash.kehadiran.unduh') }}">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Dari</label>
                                <input type="text" name="dari_tanggal" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Sampai</label>
                                <input type="text" name="sampai_tanggal" class="form-control datepicker">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Unduh</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
<script>
    $('.datepicker').datetimepicker({
        timepicker:false,
        format: 'Y-m-d'
    });

    var oTable = $('#apelTable').DataTable({
        serverSide: true,
        processing: true,
        select: true,
        ajax: {
            url: '{{ route('dash.kehadiran.apel') }}',
            data: function (d) {
                d.tanggal = $('select[name=year]').val() + '-' + $('select[name=month]').val() + '-' + $('select[name=day]').val();
                d.bidang = $('select[name=bidang]').val();
            }
        },
        columns: [
            {data: 'no_induk', name:'karyawan.no_induk', orderable: false},
            {data: 'nama_lengkap', name:'karyawan.nama_lengkap', orderable: false},
            {data: 'masuk'},
            {data: 'hari'},
            {data: 'tanggal'},
            {data: 'actions', orderable:false, searchable:false}
        ]
    });

    function editKehadiran(id) {
        var url = '{{ route('dash.kehadiran.edit', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('#formKehadiran form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                if (data.tipe == 'shift') {
                    $('.shift').hide();
                } else {
                    $('.shift').show();
                }

                $('.modal-title').text('Edit Kehadiran');
                $('#formKehadiran').modal('show');
                $('input[name=id]').val(data.id);
                $('input[name=jam_masuk]').val(data.jam_masuk);
                $('input[name=jam_istirahat]').val(data.jam_istirahat);
                $('input[name=jam_kembali]').val(data.jam_kembali);
                $('input[name=jam_pulang]').val(data.jam_pulang);
            }
        });
    }

    $('#formKehadiran form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        url_raw = '{{ route('dash.kehadiran.update', ':id') }}';
        url = url_raw.replace(':id', id);

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formKehadiran form').serialize(),
            success: function (data) {
                $('#formKehadiran').modal('hide');
                oTable.ajax.reload();
            },
            error: function () {
                alert('Gagal menambahkan data');
            }
        });
    });

</script>
@endpush
