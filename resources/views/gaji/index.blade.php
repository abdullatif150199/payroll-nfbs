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
                    <form class="form-inline" action="{{ route('dash.gaji.datatable') }}" method="post">
                        <label for="month" class="mr-sm-3">Bulan </label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <select name="month" class="form-control"
                                    onchange="$('#daftarGaji').DataTable().draw()">
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
                                <select name="year" class="form-control" onchange="$('#daftarGaji').DataTable().draw()">
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
                    <a id="loader-proses-ulang" href="#proses-ulang" data-toggle="modal" class="btn btn-primary mr-2">
                        <i class="fe fe-rotate-ccw"></i> Proses ulang gaji
                    </a>
                    <a href="#unduh-gaji" data-toggle="modal" class="btn btn-primary">
                        <i class="fe fe-download"></i> Unduh
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowra" id="daftarGaji">
                    <thead>
                        <tr>
                            <th>No. Induk</th>
                            <th>Nama Lengkap</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Lainnya</th>
                            <th>Gaji Total</th>
                            <th>Potongan</th>
                            <th>Gaji Akhir</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('gaji.modals')

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var oTable = $('#daftarGaji').DataTable({
        serverSide: true,
        processing: true,
        select: true,
        ajax: {
            url: '{{ route('dash.gaji.datatable') }}',
            data: function (d) {
                d.month = $('select[name=year]').val() + '-' + $('select[name=month]').val();
            }
        },
        columns: [
            {data: 'no_induk'},
            {data: 'nama_lengkap'},
            {data: 'gaji_pokok'},
            {data: 'tunjangan'},
            {data: 'lainnya'},
            {data: 'gatot'},
            {data: 'potongan'},
            {data: 'gaji_akhir'},
            {data: 'actions', orderable: false, searchable: false}
        ]
    });
    // $('#select-form').submit(function(e) {
    //     oTable.draw();
    //     e.preventDefault();
    // });

    const formatter = new Intl.NumberFormat('en-US', {
          style: 'currency',
          currency: 'IDR'
    });


    function detailGaji(id) {
        var url = '{{ route("dash.gaji.detail", ":id") }}';
        url = url.replace(':id', id);
        $('#loader' + id).show();
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.modal-title').text('Detail Gaji ' + data.karyawan.nama_lengkap);
                $('#gaji_pokok').text(formatter.format(data.gaji_pokok));
                $('#tunjangan_jabatan').text(formatter.format(data.tunjangan_jabatan));
                $('#tunjangan_fungsional').text(formatter.format(data.tunjangan_fungsional));
                $('#tunjangan_struktural').text(formatter.format(data.tunjangan_struktural));
                $('#tunjangan_kinerja').text(formatter.format(data.tunjangan_kinerja));
                $('#tunjangan_pendidikan').text(formatter.format(data.tunjangan_pendidikan));
                $('#tunjangan_istri').text(formatter.format(data.tunjangan_istri));
                $('#tunjangan_anak').text(formatter.format(data.tunjangan_anak));
                $('#tunjangan_hari_raya').text(formatter.format(data.tunjangan_hari_raya));
                $('#lembur').text(formatter.format(data.lembur));
                $('#lain_lain').text(formatter.format(data.lain_lain));
                $('#insentif').text(formatter.format(data.insentif));
                $('#potongan').text(formatter.format(data.sum_potongan));
                $('#gaji_total').text(formatter.format(data.gaji_total));
                $('#detail-gaji').modal('show');
                $('#loader' + id).hide();
            },
            error: function() {
                toastr.error('Data tidak ditemukan', 'Failed');
            }
        });
    }

    $('#proses-ulang form').submit(function(e) {
        e.preventDefault();
        url = '{{ route('dash.gaji.prosesUlang') }}';
        $('#loader-proses-ulang').addClass('btn-loading');

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#proses-ulang form').serialize(),
            success: function (data) {
                $('#proses-ulang').modal('hide');
                $('#loader-proses-ulang').removeClass('btn-loading');
                oTable.ajax.reload();
                toastr.success(data.message, "Success");
            },
            error: function () {
                toastr.error('Gagal memproses data', 'Failed');
            }
        });
    });
</script>
@endpush
