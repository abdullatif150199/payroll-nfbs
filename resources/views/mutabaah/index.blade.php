@extends('layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
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


        .select2-container--bootstrap4 .select2-selection--single {
            height: calc(2.25rem + 2px) !important
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__placeholder {
            color: #757575;
            line-height: 2.25rem
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow {
            position: absolute;
            top: 50%;
            right: 3px;
            width: 20px
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow b {
            top: 60%;
            border-color: #343a40 transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0;
            width: 0;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
            line-height: 2.25rem
        }

        .select2-search--dropdown .select2-search__field {
            border: 1px solid #ced4da;
            border-radius: .25rem
        }

        .select2-results__message {
            color: #6c757d
        }

        .select2-container--bootstrap4 .select2-selection--multiple {
            min-height: calc(2.25rem + 2px) !important;
            height: calc(2.25rem + 2px) !important
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__rendered {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            list-style: none;
            margin: 0;
            padding: 0 5px;
            width: 100%
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
            color: #343a40;
            border: 1px solid #bdc6d0;
            border-radius: .2rem;
            padding: 0;
            padding-right: 5px;
            cursor: pointer;
            float: left;
            margin-top: .3em;
            margin-right: 5px
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
            color: #bdc6d0;
            font-weight: 700;
            margin-left: 3px;
            margin-right: 1px;
            padding-right: 3px;
            padding-left: 3px;
            float: left
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #343a40
        }

        .select2-container :focus {
            outline: 0
        }

        .select2-container--bootstrap4 .select2-selection {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            width: 100%
        }

        .select2-container--bootstrap4.select2-container--focus .select2-selection {
            border-color: #17a2b8;
            -webkit-box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25)
        }

        .select2-container--bootstrap4.select2-container--focus.select2-container--open .select2-selection {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0
        }

        select.is-invalid~.select2-container--bootstrap4 .select2-selection {
            border-color: #dc3545
        }

        select.is-valid~.select2-container--bootstrap4 .select2-selection {
            border-color: #28a745
        }

        .select2-container--bootstrap4 .select2-dropdown {
            border-color: #ced4da;
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .select2-container--bootstrap4 .select2-dropdown .select2-results__option[aria-selected=true] {
            background-color: #e9ecef
        }

        .select2-container--bootstrap4 .select2-results__option--highlighted,
        .select2-container--bootstrap4 .select2-results__option--highlighted.select2-results__option[aria-selected=true] {
            background-color: #007bff;
            color: #f8f9fa
        }

        .select2-container--bootstrap4 .select2-results__option[role=group] {
            padding: 0
        }

        .select2-container--bootstrap4 .select2-results__group {
            padding: 6px;
            display: list-item;
            color: #6c757d
        }

        .select2-container--bootstrap4 .select2-selection__clear {
            width: 1.2em;
            height: 1.2em;
            line-height: 1.15em;
            padding-left: .3em;
            margin-top: .5em;
            border-radius: 100%;
            background-color: #6c757d;
            color: #f8f9fa;
            float: right;
            margin-right: .3em
        }

        .select2-container--bootstrap4 .select2-selection__clear:hover {
            background-color: #343a40
        }
    </style>
@endpush
@section('content')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline" action="{{ route('dash.mutabaah.datatable') }}" method="post">
                        <label for="month" class="mr-sm-3">Tanggal</label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <select name="day" class="form-control custom-select"
                                    onchange="$('#mutabaahTable').DataTable().draw()">
                                    <option value="">Tahun</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option {{ date('d') == $i ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col">
                                <select name="month" class="form-control custom-select"
                                    onchange="$('#mutabaahTable').DataTable().draw()">
                                    <option value="">Bulan</option>
                                    <option {{ date('m') == '01' ? 'selected' : '' }} value="01">Januari</option>
                                    <option {{ date('m') == '02' ? 'selected' : '' }} value="02">Februari</option>
                                    <option {{ date('m') == '03' ? 'selected' : '' }} value="03">Maret</option>
                                    <option {{ date('m') == '04' ? 'selected' : '' }} value="04">April</option>
                                    <option {{ date('m') == '05' ? 'selected' : '' }} value="05">Mei</option>
                                    <option {{ date('m') == '06' ? 'selected' : '' }} value="06">Juni</option>
                                    <option {{ date('m') == '07' ? 'selected' : '' }} value="07">Juli</option>
                                    <option {{ date('m') == '08' ? 'selected' : '' }} value="08">Augustus</option>
                                    <option {{ date('m') == '09' ? 'selected' : '' }} value="09">September</option>
                                    <option {{ date('m') == '10' ? 'selected' : '' }} value="10">Oktober</option>
                                    <option {{ date('m') == '11' ? 'selected' : '' }} value="11">November</option>
                                    <option {{ date('m') == '12' ? 'selected' : '' }} value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="year" class="form-control custom-select"
                                    onchange="$('#mutabaahTable').DataTable().draw()">
                                    <option value="">Tahun</option>
                                    @for ($i = 2018; $i <= date('Y'); $i++)
                                        <option {{ date('Y') == $i ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <label for="bidang" class="mx-sm-3">Departemen</label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <select name="bidang" class="form-control"
                                    onchange="$('#mutabaahTable').DataTable().draw()">
                                    <option value="">Semua Departemen</option>
                                    @foreach ($bidang as $key => $val)
                                        <option value="{{ $key }}">{{ substr($val, 0, 8) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="unit" class="mx-sm-3">Bidang</label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <select name="unit" class="form-control"
                                    onchange="$('#mutabaahTable').DataTable().draw()">
                                    <option value="">Semua Bidang</option>
                                    @foreach ($unit as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="item-action dropdown ml-4">
                            <button class="form-control dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-expanded="false">
                                Others
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#unduhMutabaah" data-toggle="modal">Unduh</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table"
                        id="mutabaahTable">
                        <thead>
                            <tr>
                                <th class="w-1">No. Induk</th>
                                <th>Nama Lengkap</th>
                                <th>SHUBUH</th>
                                <th>DHUHA</th>
                                <th>TILAWAH</th>
                                <th>QIYAMUL LAIL</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="unduhMutabaah">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Unduh Mutabaah</h4>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>

                <form method="post" action="{{ route('dash.mutabaah.unduh') }}">
                    <div class="modal-body">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label">Dari</label>
                                    <input type="text" name="date_start" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label">Sampai</label>
                                    <input type="text" name="date_end" class="form-control datepicker">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label">Departemen</label>
                                    <select name="bidang" class="form-control">
                                        <option value="">Semua Departemen</option>
                                        @foreach ($bidang as $key => $val)
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label">Bidang</label>
                                    <select name="unit" class="form-control">
                                        <option value="">Semua Bidang</option>
                                        @foreach ($unit as $key => $val)
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
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
            timepicker: false,
            format: 'Y-m-d'
        });
        // $(document).ready(function() {
        var oTable = $('#mutabaahTable').DataTable({
            serverSide: true,
            processing: true,
            select: true,
            ajax: {
                url: '{{ route('dash.mutabaah.datatable') }}',
                data: function(d) {
                    d.tanggal = $('select[name=year]').val() + '-' + $('select[name=month]').val() + '-' + $(
                        'select[name=day]').val();
                    d.bidang = $('select[name=bidang]').val();
                    d.unit = $('select[name=unit]').val();
                }
            },
            columns: [{
                    data: 'no_induk',
                    name: 'karyawan.no_induk',
                    orderable: false
                },
                {
                    data: 'nama_lengkap',
                    name: 'karyawan.nama_lengkap',
                    orderable: false
                },
                {
                    data: 'shubuh'
                },
                {
                    data: 'dhuha'
                },
                {
                    data: 'tilawah_quran'
                },
                {
                    data: 'qiyamul_lail'
                },
            ]
        });
    </script>
@endpush
