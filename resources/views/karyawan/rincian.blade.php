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
                        <p class="text-muted mb-2">
                            NIP: {{ $data->no_induk }}
                            {{-- &middot;
                            @foreach ($data->jabatan as $item)
                            {{ $item->nama_jabatan }}
                            @endforeach --}}
                        </p>
                        <a href="https://wa.me/{{ $data->no_hp }}?text=Assalaamualaikum"
                            class="btn btn-outline-success btn-sm" target="_blank">
                            <span class="fa fa-whatsapp"></span> Chat
                        </a>
                        <a href="#smsKaryawan" data-toggle="modal" class="btn btn-outline-warning btn-sm">
                            <span class="fa fa-envelope-o"></span> SMS
                        </a>
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
                        <h3>Rincian Pegawai</h3>
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
                        <form id="estimate">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Golongan</label>
                                        <select class="form-control" name="golongan">
                                            <option value=""></option>
                                            @foreach (App\Models\Golongan::pluck('kode_golongan', 'id') as $key =>
                                            $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Kelompok Kerja</label>
                                        <select class="form-control" name="kelompok_kerja">
                                            <option value=""></option>
                                            @foreach (App\Models\KelompokKerja::pluck('grade', 'id') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Status Kerja</label>
                                        <select class="form-control" name="status_kerja">
                                            <option value=""></option>
                                            @foreach (App\Models\StatusKerja::pluck('nama_status_kerja', 'id') as $key
                                            => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer mt-3">
                                <button id="loader-estimate" class="btn btn-primary btn-block">Dapatkan Estimasi
                                    Gaji</button>
                            </div>
                        </form>
                        <div class="alert alert-info mt-4" role="alert" id="resultEstimate" style="display: none;">
                            <strong>Estimasi Gaji Jika Kinerja Normal</strong>
                            <div class="m-4">
                                <p id="gaji_pokok"></p>
                                <p id="tunj_jabatan"></p>
                                <p id="tunj_struktural"></p>
                                <p id="tunj_fungsional"></p>
                                <p id="tunj_kinerja"></p>
                                <strong id="gatot" class="text-success"></strong>
                            </div>
                        </div>
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
                        <p>{{ $data->nama_bank }}</p>
                        <p>No. Rek: {{ $data->no_rekening }} a.n {{ $data->rekening_atas_nama }}</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

{{-- Modal SMS --}}
<div class="modal fade" id="smsKaryawan">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">SMS Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Nomor Tujuan</label>
                                <input type="text" class="form-control" name="no_hp" value="{{ $data->no_hp }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Isi Pesan</label>
                                <textarea class="form-control" name="pesan" rows="8"
                                    cols="80">Assalaamualaikum...</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="loader-sms">Kirim</button>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#estimate').submit(function(e) {
        e.preventDefault();
        var url = '{{ route("dash.karyawan.estimasi", $data->id) }}';
        $('#loader-estimate').addClass('btn-loading');

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#estimate').serialize(),
            success: function (data) {
                $('#loader-estimate').removeClass('btn-loading');
                $('#resultEstimate').show();
                $('#gaji_pokok').html('Gaji Pokok: ' + data.estimate['gaji_pokok']);
                $('#tunj_jabatan').html('Tunj Jabatan: ' + data.estimate['tunj_jabatan']);
                $('#tunj_fungsional').html('Tunj Fungsional: ' + data.estimate['tunj_fungsional']);
                $('#tunj_struktural').html('Tunj Struktural: ' + data.estimate['tunj_struktural']);
                $('#tunj_kinerja').html('Tunj Kinerja: ' + data.estimate['tunj_kinerja']);
                $('#gatot').html('Gaji Total: ' + data.estimate['gatot']);
                toastr.success(data.message, "Success");
            },
            error: function () {
                toastr.error('Gagal memproses data', 'Failed');
            }
        });
    });

    $('#smsKaryawan').submit(function(e) {
        e.preventDefault();
        var url = '{{ route("dash.karyawan.sms") }}';
        $('#loader-sms').addClass('btn-loading');

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#smsKaryawan form').serialize(),
            success: function (data) {
                $('#smsKaryawan').modal('hide');
                $('#loader-sms').removeClass('btn-loading');
                toastr.success(data.message, "Success");
            },
            error: function () {
                toastr.error('SMS gagal!', 'Failed');
            }
        });
    });
</script>
@endpush
