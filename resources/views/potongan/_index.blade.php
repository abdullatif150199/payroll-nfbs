@extends('layouts.main')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
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
                <h3 class="card-title">
                    Tabel Daftar Potongan
                </h3>
                <div class="card-options">
                    <a onclick="newPotongan()" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowra" id="tableDaftarPotongan">
                    <thead>
                        <tr>
                            <th>Nama Potongan</th>
                            <th>Jumlah Potongan</th>
                            <th>Rekening Penampung</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('potongan._modals')

@endsection

@push('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#tableDaftarPotongan').DataTable({
            serverSide: true,
            processing: true,
            select: true,
            ajax: '{{ route('dash.potongan.daftarPotongan') }}',
            columns: [
                {data: 'nama_potongan'},
                {data: 'jumlah_potongan'},
                {data: 'rekening', orderable: false, searchable: false},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });

        $('body').tooltip({selector: '[data-toggle="tooltip"]'});

        $('.selectize-select').selectize({
            maxItems: 10
        });
    });

    function selectName(att) {
        $(att).select2({
            theme: "bootstrap4",
            placeholder: "Ketikan disini...",
            dropdownAutoWidth: true,
            allowClear: true,
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('dash.potongan.name') }}',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.nama_potongan,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        })
    }

    function newPotongan() {
        $('#daftarPotongan').modal('hide');
        $('.modal-title').text('Tambah Potongan Baru');
        $('#formPotongan').modal('show');
        $('input[name=_method]').val('POST');
        $('#formPotongan form')[0].reset();
        $('#type').change(function () {
            var val = $(this).val();
            if (val === 'percent') {
                $('#percent').show();
                $('#decimal').hide();
            } else {
                $('#percent').hide();
                $('#decimal').show();
            }
        });
    }

    function editPotongan(id) {
        var url = '{{ route('dash.potongan.edit', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('#formPotongan form')[0].reset();
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.modal-title').text('Edit Potongan');
                $('#formPotongan').modal('show');
                $('input[name=id]').val(data.id);
                $('input[name=nama_potongan]').val(data.nama_potongan);
                $('select[name=type]').val(data.type);
                $('select[name=rekening_id]').val(data.rekening_id);
                // $('select[name=type] option[value='+ data.type +']').attr('selected', true);
                var val = data.type;
                if (val === 'percent') {
                    $('#decimal').hide();
                    $('#percent').show();
                    var str = data.jumlah_potongan;
                    var ex = str.split('*');
                    // console.log(ex[0]);
                    $('input[name=jumlah_persentase]').val(ex[0] * 100);
                    $('select[name=jenis_persentase]').val(ex[1]);
                    $('#type').change(function () {
                        val = $(this).val();
                        if (val === 'decimal') {
                            $('#percent').hide();
                            $('#decimal').show();
                        }else {
                            $('#percent').show();
                            $('#decimal').hide();
                        }
                    });
                } else {
                    $('#percent').hide();
                    $('#decimal').show();
                    if (data.type !== 'percent') {
                        $('input[name=jumlah_potongan]').val(data.jumlah_potongan);
                    }
                    $('#type').change(function () {
                        val = $(this).val();
                        if (val === 'percent') {
                            $('#percent').show();
                            $('#decimal').hide();
                        }else {
                            $('#percent').hide();
                            $('#decimal').show();
                        }
                    });
                }
            },
            error: function() {
                alert('Data tidak ditemukan');
            }
        });
    }

    $('#formPotongan form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();

        if (save_method == 'POST') {
            url = '{{ route('dash.potongan.store') }}';
        } else {
            url_raw = '{{ route('dash.potongan.update', ':id') }}';
            url = url_raw.replace(':id', id);
            // console.log(id);
        }

        $.ajax({
            url : url,
            type: 'POST',
            data: $('#formPotongan form').serialize(),
            success: function(data) {
                $('#formPotongan').modal('hide');
                location.reload(); // refresh page
            },
            error: function() {
                alert('Gagal menyimpan data');
            }
        });
    });

    function hapusPotongan(id, name) {
        var url = '{{ route('dash.potongan.destroy', ':id') }}';
        url = url.replace(':id', id);
        $('.modal-title').text('Hapus Potongan ' + name);
        $('input[name=_method]').val('DELETE');
        $('#hapusPotongan').modal('show');
        $('#hapusPotongan form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#hapusPotongan form').serialize(),
                success: function(data) {
                    $('#hapusPotongan').modal('hide');
                    location.reload(); // refresh page
                }
            });

        })
    }
</script>
@endpush
