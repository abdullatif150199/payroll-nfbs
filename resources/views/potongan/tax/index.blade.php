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
</style>
@endpush
@section('content')
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <form class="form-inline" action="{{ route('dash.pajak.datatable') }}" method="post">
                        <label for="month" class="mr-sm-3">Bulan </label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <select name="month" class="form-control"
                                    onchange="$('#daftarPajak').DataTable().draw()">
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
                                <select name="year" class="form-control"
                                    onchange="$('#daftarPajak').DataTable().draw()">
                                    <option value="">Tahun</option>
                                    @for ($i=2018; $i <= date('Y'); $i++) <option {{ date('Y') == $i ? 'selected' : ''}}
                                        value="{{$i}}">
                                        {{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </form>
                </h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowra" id="daftarPajak">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Gaji</th>
                            <th>Gaji Pertahun</th>
                            <th>THR</th>
                            <th>Penghasilan Bruto</th>
                            <th>Biaya Jabatan</th>
                            <th>Penghasilan Neto</th>
                            <th>PTKP Setahun</th>
                            <th>PKP Setahun</th>
                            <th>PPH 21</th>
                            <th>PPH 21 Sebulan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#daftarPajak').DataTable({
        serverSide: true,
        processing: true,
        select: true,
        ajax: {
            url: '{{ route('dash.pajak.datatable') }}',
                data: function (d) {
                d.bulan = $('select[name=year]').val() + '-' + $('select[name=month]').val();
            }
        },
        columns: [
            {data: 'nama_lengkap'},
            {data: 'gaji_perbulan'},
            {data: 'gaji_pertahun'},
            {data: 'thr'},
            {data: 'penghasilan_bruto'},
            {data: 'biaya_jabatan'},
            {data: 'penghasilan_neto'},
            {data: 'ptkp_pertahun'},
            {data: 'pkp_pertahun'},
            {data: 'pph21_pertahun'},
            {data: 'pph21_perbulan'}
        ]
    });
</script>
@endpush
