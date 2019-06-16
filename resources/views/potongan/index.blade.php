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
            ajax: '{{ route('getPotongan') }}',
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
        $('#formPotongan').modal('show');
        $('.modal-title').text('Tambah Potongan Baru');
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

        $('#formPotongan form').submit(function(e) {
            e.preventDefault();
            // console.log($('#newPotongan form').serialize());

            $.ajax({
                url : '{{ route('storePotongan') }}',
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
    }

    function editPotongan(id) {
        var url = '{{ route("editPotongan", ":id") }}';
        url = url.replace(':id', id);
        var url2 = '{{ route("updatePotongan", ":id") }}';
        url2 = url2.replace(':id', id);
        $('.modal-title').text('Edit Potongan');
        $('#formPotongan form').attr('action', url2);
        $('input[name=_method]').val('PUT');
        $('#formPotongan form')[0].reset();
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#formPotongan').modal('show');
                $('input[name=nama_potongan]').val(data.nama_potongan);
                $('#type').change(function () {
                    var val = data.type;
                    if (val === 'percent') {
                        $('#decimal').hide();
                        $('#percent').show();
                        $('select[name=type]').val(data.type);
                        $('input[name=jumlah_persentase]').val(data.jumlah_persentase);
                        $('input[name=jenis_persentase]').val(data.jenis_persentase);

                    } else {
                        $('#percent').hide();
                        $('#decimal').show();
                        $('select[name=type]').val(data.type);
                        $('input[name=jumlah_potongan]').val(data.jumlah_potongan);
                    }
                });
            },
            error: function() {
                alert('Data tidak ditemukan');
            }
        });
    }

    function hapusPotongan(id) {
        var url = '{{ route("hapusPotongan", ":id") }}';
        url = url.replace(':id', id);
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
        var url = '{{ route("showPotonganKaryawan", ":id") }}';
        url = url.replace(':id', id_karyawan);
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                var urlp = '{{ route("attachPotongan", ":id") }}';
                url = urlp.replace(':id', data.id);
                $('.modal-title').text('Tambah Potongan ' + data.nama_lengkap);
                $('#tambahPotongan form').attr('action', url);
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
        var url = '{{ route("editPotongan", ":id_potongan") }}';
        url = url.replace(':id_potongan', id_potongan);
        var url_delete = '{{ route("detachPotongan", ["id_potongan" => ":id_potongan", "id_karyawan" => ":id_karyawan"]) }}';
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
