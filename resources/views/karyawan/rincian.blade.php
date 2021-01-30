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
                        <div class="card-category text-muted text-left mb-4">
                            Rincian Pegawai
                        </div>
                        <table class="table card-table table-striped table-vcenter">
                            <tbody>
                                <tr>
                                    <td>NIK</td>
                                    <td>{{ $data->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>
                                        {{ $data->tempat_lahir . ', ' . date('d M Y', strtotime($data->tanggal_lahir)) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                </tr>
                                <tr>
                                    <td>Status Pernikahan</td>
                                    <td>{{ $data->status_pernikahan == 'M' ? 'Menikah' : 'Belum Menikah' }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $data->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>No. HP</td>
                                    <td>{{ $data->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>{{ $data->nama_pendidikan .' ('. $data->tahun_lulus .')' }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>{{ $data->pendidikan_terakhir .' - '. $data->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td>No. HP</td>
                                    <td>{{ $data->tanggal_masuk }}</td>
                                </tr>
                                @if ($data->status === '3')
                                <tr>
                                    <td>Tanggal Keluar</td>
                                    <td>{{ $data->tanggal_keluar }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="v-pills-estimasi" role="tabpanel"
                        aria-labelledby="v-pills-estimasi-tab">
                        <div class="card-category text-muted text-left mb-4">
                            Estimasi Gaji
                        </div>
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
                        <div class="card-category text-muted text-left mb-4">
                            Keluarga
                            <span class="pull-right">
                                <a href="#formKeluarga" data-toggle="modal" class="btn btn-primary"
                                    title="Tambah keluarga">
                                    <i class="fe fe-plus"></i>
                                </a>
                            </span>
                        </div>
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Tunj Keluarga Sampai</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="row">
                                @if ($data->keluarga->count() > 0)
                                @foreach ($data->keluarga as $item)
                                <tr id="r{{ $item->id }}">
                                    <td>{{ $item->nama }}</td>
                                    <td><strong>{{ $item->statusKeluarga->status }}</strong></td>
                                    <td><strong>{{ date('d M Y', strtotime($item->akhir_tunj_keluarga)) }}</strong></td>
                                    <td>
                                        <a class="icon mr-2" onclick="editKeluarga({{ $item->id }})" title="edit">
                                            <i class="fe fe-edit"></i>
                                        </a>

                                        <a class="icon" onclick="hapusKeluarga({{ $item->id }})" title="hapus">
                                            <i class="fe fe-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" class="text-center">Tidak tersedia</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="v-pills-rekening" role="tabpanel"
                        aria-labelledby="v-pills-rekening-tab">
                        <div class="card-category text-muted text-left mb-4">
                            Rekening
                        </div>
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th>Nama Bank</th>
                                    <th>No. Rekening</th>
                                    <th>Atas Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data->nama_bank }}</td>
                                    <td><strong>{{ $data->no_rekening }}</strong></td>
                                    <td>{{ $data->rekening_atas_nama }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@include('karyawan.modals_rincian')

@endsection

@push('scripts')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#status_keluarga').change(function () {
        var val = $(this).val();
        if (val == '3') {
            $('#tunj_pendidikan').show();
        } else {
            $('#tunj_pendidikan').hide();
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

    $('#formKeluarga form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var save_method = $('input[name=_method]').val();
        $('#submit-keluarga').addClass('btn-loading');

        if (save_method == 'POST') {
            url = '{{ route('dash.keluarga.store') }}';
        } else {
            url_raw = '{{ route('dash.keluarga.update', ':id') }}';
            url = url_raw.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formKeluarga form').serialize(),
            success: function (data) {
                $("#formKeluarga form")[0].reset();
                $('#submit-keluarga').removeClass('btn-loading');
                $('#row').append('<tr id="r'+ data.id +'"><td>'+ data.nama +'</td><td><strong>'+ data.status_keluarga.status +'</strong></td><td><strong>'+ data.atk +'</strong></td><td><a class="icon mr-2" onclick="editKeluarga('+ data.id +')" title="edit"><i class="fe fe-edit"></i></a><a class="icon" onclick="hapusKeluarga('+ data.id +')" title="hapus"><i class="fe fe-trash"></i></a></td></tr>');
                $('#formKeluarga').modal('hide');
                toastr.success("Data berhasil diproses", "Success");
            },
            error: function () {
                toastr.error('Gagal memproses data', 'Failed');
            }
        });
    });

    function editKeluarga(id) {
        var url = '{{ route('dash.keluarga.edit', ':id') }}';
        url = url.replace(':id', id);
        $('input[name=_method]').val('PUT');
        $('#select2').remove();
        $('#formKeluarga form')[0].reset();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#formKeluarga').modal('show');
                var date = data.tanggal_lahir;
                var arr = date.split("-");
                var akhir_tunj_keluarga = data.akhir_tunj_keluarga;
                var atk = akhir_tunj_keluarga.split("-");
                $('input[name=nama]').val(data.nama);
                $('#birth_day').val(arr[2]);
                $('#birth_month').val(arr[1]);
                $('#birth_year').val(arr[0]);
                $('#atk_day').val(arr[2]);
                $('#atk_month').val(arr[1]);
                $('#atk_year').val(arr[0]);
                $('#status_keluarga').val(data.status_keluarga_id);
                $('#status_keluarga').change(function () {
                    var val = $(this).val();
                    if (val == '3') {
                        $('#tunj_pendidikan').show();
                    } else {
                        $('#tunj_pendidikan').hide();
                    }
                });

            }
        });
    }

    function hapusKeluarga(id) {
        $('input[name=id]').val(id);
        $('#hapusKeluarga .modal-body').text('Yakin ingin menghapus?');
        $('#hapusKeluarga').modal('show');
    }

    $('#hapusKeluarga form').submit(function(e) {
        e.preventDefault();
        var id = $('input[name=id]').val();
        var url = '{{ route('dash.keluarga.destroy', ':id') }}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: "DELETE",
            success: function (data) {
                $('#hapusKeluarga').modal('hide');
                $('#r' + id).remove();
                toastr.success(data.message, "Success");
            },
            error: function () {
                toastr.error('Gagal memproses data', 'Failed');
            }
        });
    });
</script>
@endpush
