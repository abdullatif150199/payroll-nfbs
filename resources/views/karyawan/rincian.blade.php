@extends('layouts.main')
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Menu</h3>
            </div>
            <div class="card-body">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-rincian-tab" data-toggle="pill" href="#v-pills-rincian"
                        role="tab" aria-controls="v-pills-rincian" aria-selected="true">Rincian</a>
                    <a class="nav-link" id="v-pills-estimasi-tab" data-toggle="pill" href="#v-pills-estimasi" role="tab"
                        aria-controls="v-pills-estimasi" aria-selected="false">Estimasi Gaji</a>
                    <a class="nav-link" id="v-pills-keluarga-tab" data-toggle="pill" href="#v-pills-keluarga" role="tab"
                        aria-controls="v-pills-keluarga" aria-selected="false">Keluarga</a>
                    <a class="nav-link" id="v-pills-rekening-tab" data-toggle="pill" href="#v-pills-rekening" role="tab"
                        aria-controls="v-pills-rekening" aria-selected="false">Rekening</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                        aria-controls="v-pills-settings" aria-selected="false">Setting</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Overview
                </h3>
            </div>
            <ul class="list-group card-list-group">
                <li class="list-group-item py-5">
                    <table class="table table-borderless mb-0">
                        <tr class="text-center">
                            <td>Golongan: <span class="tag tag-gray-dark">{{ $data->golongan->kode_golongan }}</span>
                            </td>
                            <td>Kelompok Kerja: <span class="tag tag-gray-dark">{{ $data->kelompokkerja->grade }}</span>
                            </td>
                            <td>Status Kerja: <span
                                    class="tag tag-gray-dark">{{ $data->statuskerja->nama_status_kerja }}</span></td>
                        </tr>
                    </table>
                </li>
                <li class="list-group-item py-5 tab-content">
                    <div class="tab-pane fade show active" id="v-pills-rincian" role="tabpanel"
                        aria-labelledby="v-pills-rincian-tab">
                        <h3>Rincian Karyawan</h3>
                        NIK: <h5>{{ $data->nik }}</h5>
                        Tempat, tanggal lahir: <h5>
                            {{ $data->tempat_lahir . ', ' . date('d M Y', strtotime($data->tanggal_lahir)) }}</h5>
                        Jenis Kelamin: <h5>{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</h5>
                        Status Pernikahan: <h5>{{ $data->status_pernikahan == 'M' ? 'Menikah' : 'Belum Menikah' }}</h5>
                        Alamat: <h5>{{ $data->alamat }}</h5>
                        No. HP: <h5>{{ $data->no_hp }}</h5>
                        Pendidikan:
                        <h5>
                            {{ $data->nama_pendidikan .' - '. $data->tahun_lulus }} <br>
                            {{ $data->pendidikan_terakhir .' - '. $data->jurusan }}
                        </h5>
                        Tanggal Masuk: <h5>{{ $data->tanggal_masuk }}</h5>
                        @if ($data->status === '3')
                        Tanggal Keluar: <h5>{{ $data->tanggal_keluar }}</h5>
                        @endif
                    </div>

                    <div class="tab-pane fade" id="v-pills-estimasi" role="tabpanel"
                        aria-labelledby="v-pills-estimasi-tab">
                        <h3>Estimasi Gaji</h3>
                    </div>

                    <div class="tab-pane fade" id="v-pills-keluarga" role="tabpanel"
                        aria-labelledby="v-pills-keluarga-tab">
                        <h3>Keluarga</h3>
                        @foreach ($data->keluarga as $keluarga)
                        <p>{{ $keluarga->nama }} - {{ $keluarga->statusKeluarga->status }}</p>
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="v-pills-rekening" role="tabpanel"
                        aria-labelledby="v-pills-rekening-tab">
                        <h3>Rekening</h3>
                    </div>

                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <h3>Setting</h3>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
