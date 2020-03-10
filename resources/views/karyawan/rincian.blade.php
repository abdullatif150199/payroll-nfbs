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
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <span class="avatar avatar-xxl mr-5" style="background-image: url(demo/faces/male/21.jpg)"></span>
                    <div class="media-body">
                        <h4 class="m-0">{{ $data->nama_lengkap }}</h4>
                        <p class="text-muted mb-0">{!! $data->no_induk . ' &middot; ' . $data->jabatan->nama_jabatan !!}
                        </p>
                        <ul class="social-links list-inline mb-0 mt-2">
                            <li class="list-inline-item">
                                <a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)"><i class="fa fa-whatsapp"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Rincian Karyawan
                </h3>
            </div>
            <ul class="list-group card-list-group">
                <li class="list-group-item py-5">
                    <table class="table table-borderless mb-0">
                        <tr class="text-center">
                            <td>Golongan: <span class="tag tag-gray-dark">{{ $data->golongan->kode_golongan }}</span></td>
                            <td>Kelompok Kerja: <span class="tag tag-gray-dark">{{ $data->kelompokkerja->grade }}</span>
                            </td>
                            <td>Status Kerja: <span class="tag tag-gray-dark">{{ $data->statuskerja->nama_status_kerja }}</span></td>
                        </tr>
                    </table>
                </li>
                <li class="list-group-item py-5">
                    NIK: <h5>{{ $data->nik }}</h5>
                    Tempat, tanggal lahir: <h5>{{ $data->tempat_lahir . ', ' . date('d M Y', strtotime($data->tanggal_lahir)) }}</h5>
                    Jenis Kelamin: <h5>{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</h5>
                    Status Pernikahan: <h5>{{ $data->status_pernikahan == 'M' ? 'Menikah' : 'Belum Menikah' }}</h5>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
