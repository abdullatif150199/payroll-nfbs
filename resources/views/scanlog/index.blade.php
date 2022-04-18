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
                <form class="form-inline" action="{{ route('dash.scanlog.datatable') }}" method="post">
                    <label for="month" class="mr-sm-3">Tanggal</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <select name="day" class="form-control custom-select"
                                onchange="$('#scanlogTable').DataTable().draw()">
                                <option value="">Tahun</option>
                                @for ($i=1; $i <= 31; $i++) <option {{ date('d')==$i ? 'selected' : '' }}
                                    value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select name="month" class="form-control custom-select"
                                onchange="$('#scanlogTable').DataTable().draw()">
                                <option value="">Bulan</option>
                                <option {{ date('m')=='01' ? 'selected' : '' }} value="01">Januari</option>
                                <option {{ date('m')=='02' ? 'selected' : '' }} value="02">Februari</option>
                                <option {{ date('m')=='03' ? 'selected' : '' }} value="03">Maret</option>
                                <option {{ date('m')=='04' ? 'selected' : '' }} value="04">April</option>
                                <option {{ date('m')=='05' ? 'selected' : '' }} value="05">Mei</option>
                                <option {{ date('m')=='06' ? 'selected' : '' }} value="06">Juni</option>
                                <option {{ date('m')=='07' ? 'selected' : '' }} value="07">Juli</option>
                                <option {{ date('m')=='08' ? 'selected' : '' }} value="08">Augustus</option>
                                <option {{ date('m')=='09' ? 'selected' : '' }} value="09">September</option>
                                <option {{ date('m')=='10' ? 'selected' : '' }} value="10">Oktober</option>
                                <option {{ date('m')=='11' ? 'selected' : '' }} value="11">November</option>
                                <option {{ date('m')=='12' ? 'selected' : '' }} value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="year" class="form-control custom-select"
                                onchange="$('#scanlogTable').DataTable().draw()">
                                <option value="">Tahun</option>
                                @for ($i=2018; $i <= date('Y'); $i++) <option {{ date('Y')==$i ? 'selected' : '' }}
                                    value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                    <label for="bidang" class="mx-sm-3">Mesin </label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <select name="device" class="form-control" onchange="$('#scanlogTable').DataTable().draw()">
                                <option value="">Semua mesin</option>
                                @foreach ($devices as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
                <div class="card-options">
                    <a class="btn btn-primary mr-2" href="#unduhScanlog" data-toggle="modal"><i class="fe fe-download"></i> Unduh</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table"
                    id="scanlogTable">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Jam Scan</th>
                            <th>Tgl Scan</th>
                            <th>Tempat</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('scanlog.modals')

@endsection

@push('scripts')
<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
<script>
    $('.datepicker').datetimepicker({
        timepicker:false,
        format: 'Y-m-d'
    });
    var oTable = $('#scanlogTable').DataTable({
        serverSide: true,
        processing: true,
        select: true,
        ajax: {
            url: '{{ route('dash.scanlog.datatable') }}',
            data: function (d) {
                d.tanggal = $('select[name=year]').val() + '-' + $('select[name=month]').val() + '-' + $('select[name=day]').val();
                d.device = $('select[name=device]').val();
            }
        },
        columns: [
            {data: 'nama_lengkap'},
            {data: 'jam_scan', name: 'scan_at'},
            {data: 'tgl_scan', name: 'scan_at'},
            {data: 'tempat', name: 'device_id'}
        ]
    });
</script>
@endpush
