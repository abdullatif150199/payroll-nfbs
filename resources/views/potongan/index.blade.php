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
                <h3 class="card-title">Daftar Potongan</h3>
                <div class="card-options">
                    <a href="#daftarPotongan" data-toggle="modal" data-backdrop="static" class="btn btn-primary"><i class="fe fe-list"></i> Daftar Potongan</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowra" id="potonganTable">
                    <thead>
                        <tr>
                            <th>No. Induk</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Potongan</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('potongan.modals')

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#potonganTable').DataTable({
            serverSide: true,
            processing: true,
            select: true,
            ajax: '{{ route('dash.getPotongan') }}',
            columns: [
                {data: 'no_induk'},
                {data: 'nama_lengkap'},
                {data: 'jenis_potongan', orderable: false, searchable: false},
                {data: 'actions', orderable: false, searchable: false}
            ],
            columnDefs: [
                {
                    'targets': 3,
                    'className': 'text-right'
                }
            ]
        });

        $('body').tooltip({selector: '[data-toggle="tooltip"]'});

        $('.selectize-select').selectize({
            maxItems: 10
        });
    });

    $(function() {
        if (sessionStorage.reloadAfterPageLoad == 1) {
            $('#daftarPotongan').modal('show');
            sessionStorage.reloadAfterPageLoad = '';
        }
    });

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
        var url = '{{ route("dash.editPotongan", ":id") }}';
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
            url = '{{ route('dash.storePotongan') }}';
        } else {
            url_raw = '{{ route('dash.updatePotongan', ':id') }}';
            url = url_raw.replace(':id', id);
            console.log(id);
        }

        $.ajax({
            url : url,
            type: 'POST',
            data: $('#formPotongan form').serialize(),
            success: function(data) {
                $('#formPotongan').modal('hide');
                sessionStorage.reloadAfterPageLoad = 1;
                location.reload(); // refresh page
            },
            error: function() {
                alert('Gagal menyimpan data');
            }
        });
    });

    function hapusPotongan(id, name) {
        var url = '{{ route("dash.hapusPotongan", ":id") }}';
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
                    sessionStorage.reloadAfterPageLoad = 1;
                    location.reload(); // refresh page
                }
            });

        })
    }

    function tambahPotongan(id_karyawan) {
        var url = '{{ route("dash.showPotonganKaryawan", ":id") }}';
        url = url.replace(':id', id_karyawan);
        $('#tambahPotongan form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                var urlp = '{{ route("dash.attachPotongan", ":id") }}';
                url = urlp.replace(':id', data.id);
                $('.modal-title').text('Tambah Potongan ' + data.nama_lengkap);
                $('#tambahPotongan form').attr('action', url);
                $('input[name=_method]').val('POST');
                $('#potongan-karyawan')[0].selectize.clear();
                $.each(data.potongan, function(k, v) {
                    var $select = $('#potongan-karyawan');
                    var selectize = $select[0].selectize;
                    selectize.addItem(v.id);
                });
                $('#tambahPotongan').modal('show');
            },
            error: function() {
                alert('Data tidak ditemukan');
            }
        });
    }

    function deleteModal(id_potongan, name, id_karyawan) {
        var url = '{{ route("dash.editPotongan", ":id_potongan") }}';
        url = url.replace(':id_potongan', id_potongan);
        var url_delete = '{{ route("dash.detachPotongan", ["id_potongan" => ":id_potongan", "id_karyawan" => ":id_karyawan"]) }}';
        url_delete = url_delete.replace(':id_potongan', id_potongan);
        url_delete = url_delete.replace(':id_karyawan', id_karyawan);
        $('.modal-title').text('Warning!');
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.modal-body').html('Yakin ingin menghapus potongan <strong>' + data.nama_potongan + '</strong> dari <strong>' + name + '</strong>');
                $('#modalDelete form').attr('action', url_delete);
                $('#modalDelete').modal('show');
            },
            error: function() {
                alert('Data tidak ditemukan');
            }
        });

    }
</script>
@endpush
