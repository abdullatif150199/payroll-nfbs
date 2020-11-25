@extends('layouts.main')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
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

    /*fileupload*/
</style>
@endpush
@section('content')
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <form class="form-inline" action="{{ route('dash.lembur.datatable') }}" method="post">
                        <label for="month" class="mr-sm-3">Bulan </label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <select name="month" class="form-control custom-select"
                                    onchange="$('#daftarLembur').DataTable().draw()">
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
                                    onchange="$('#daftarLembur').DataTable().draw()">
                                    <option value="">Tahun</option>
                                    @for ($i=2018; $i <= date('Y'); $i++) <option {{ date('Y') == $i ? 'selected' : ''}}
                                        value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </form>
                </h3>
                <div class="card-options">
                    <button type="button" id="newLembur" class="btn btn-primary"><i class="fe fe-plus"></i>
                        Tambah</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowra" id="daftarLembur">
                    <thead>
                        <tr>
                            <th>No. Induk</th>
                            <th>Nama Lengkap</th>
                            <th>Jml Jam</th>
                            <th>Total Tarif</th>
                            <th>Keterangan</th>
                            <th>Tipe</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('lembur.modals')

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var oTable = $('#daftarLembur').DataTable({
        serverSide: true,
        processing: true,
        select: true,
        ajax: {
            url: '{{ route('dash.lembur.datatable') }}',
            data: function (d) {
                d.bulan = $('select[name=year]').val() + '-' + $('select[name=month]').val();
            }
        },
        columns: [
            {data: 'no_induk'},
            {data: 'nama_lengkap'},
            {data: 'jumlah_jam'},
            {data: 'total_tarif'},
            {data: 'keterangan'},
            {data: 'type'},
            {data: 'actions', orderable: false, searchable: false}
        ]
    });
    // $('#select-form').submit(function(e) {
    //     oTable.draw();
    //     e.preventDefault();
    // });
    $('#newLembur').click(function () {
        $('.modal-title').text('Create Lembur');
        $('#formLembur').modal('show');
        $('input[name=_method]').val('POST');
        $('#formLembur form')[0].reset();
        selectName('.cari');
    });

    function selectName(att) {
        $(att).select2({
            theme: "bootstrap4",
            placeholder: "Ketikan disini...",
            dropdownAutoWidth: true,
            allowClear: true,
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('dash.karyawan.name') }}',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.nama_lengkap,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    }

    function editLembur(id) {
        var url = '{{ route('dash.lembur.edit', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('#select2').hide();
        $('#formLembur form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('.modal-title').text('Edit Lembur');
                $('#formLembur').modal('show');
                var bulan = data.bulan;
                var arr = bulan.split("-");
                $('select[name=month]').val(arr[1]);
                $('select[name=year]').val(arr[0]);
                $('input[name=id]').val(data.id);
                $('input[name=jenis_insentif]').val(data.jenis_insentif);
                $('input[name=jumlah]').val(data.jumlah);
                $('input[name=keterangan]').val(data.keterangan);
            }
        });
    }

    $('#formLembur form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        if (save_method == 'POST') {
            url = '{{ route('dash.lembur.store') }}';
        } else {
            url_raw = '{{ route('dash.lembur.update', ':id') }}';
            url = url_raw.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formLembur form').serialize(),
            success: function (data) {
                $('#formLembur').modal('hide');
                oTable.ajax.reload();
            },
            error: function () {
                alert('Gagal menambahkan data');
            }
        });
    });

    function hapusLembur(id) {
        var url = '{{ route('dash.lembur.destroy', ':id') }}';
        url = url.replace(':id', id);
        $('#hapusLembur .modal-body').text('Yakin ingin menghapus?');
        $('#hapusLembur form').attr('action', url);
        $('#hapusLembur').modal('show');
    }

</script>
@endpush
