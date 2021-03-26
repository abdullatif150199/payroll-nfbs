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
                    <a class="nav-link" id="v-pills-potongan-tab" data-toggle="pill" href="#v-pills-potongan" role="tab"
                        aria-controls="v-pills-potongan" aria-selected="false">Potongan</a>
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
                                    <td>{{ $data->nama_pendidikan .' (Lulus th. '. $data->tahun_lulus .')' }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>{{ $data->pendidikan_terakhir .' - '. $data->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td>Tgl Masuk Kerja</td>
                                    <td>{{ date('d M Y', strtotime($data->tanggal_masuk)) }}</td>
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
                                <button id="newKeluarga" class="btn btn-primary" title="Tambah keluarga">
                                    <i class="fe fe-plus"></i>
                                </button>
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
                                    <td>
                                        <div>{{ $item->nama }}</div>
                                        @if (!empty($item->tunjangan_pendidikan))
                                        @if ($item->status_keluarga_id === config('var.status_keluarga_id'))
                                        <div class="small text-muted">
                                            Tunjangan Pendidikan
                                        </div>
                                        @endif
                                        @endif
                                    </td>
                                    <td>
                                        <div>{{ $item->statusKeluarga->status }}</div>
                                        @if (!empty($item->tunjangan_pendidikan))
                                        @if ($item->status_keluarga_id === config('var.status_keluarga_id'))
                                        <div class="small text-muted">
                                            {{ number_format($item->tunjangan_pendidikan) }}
                                        </div>
                                        @endif
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ date('d M Y', strtotime($item->akhir_tunj_keluarga)) }}</strong>
                                        @if (!empty($item->tunjangan_pendidikan))
                                        @if ($item->status_keluarga_id === config('var.status_keluarga_id'))
                                        <div class="small text-muted">
                                            {{ date('d M Y', strtotime($item->akhir_tunj_pendidikan)) }}
                                        </div>
                                        @endif
                                        @endif
                                    </td>
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

                    <div class="tab-pane fade" id="v-pills-potongan" role="tabpanel"
                        aria-labelledby="v-pills-potongan-tab">
                        <div class="card-category text-muted text-left mb-4">
                            Potongan
                        </div>
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th>Nama Potongan</th>
                                    <th>Jml Potongan</th>
                                    <th>Telah terpotong</th>
                                    <th>Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data->potongan as $item)
                                <tr>
                                    <td>{{ $item->nama_potongan }}</td>
                                    <td>{{ $item->jumlah_potongan }}</td>
                                    <td id="qty{{ $item->id }}">{{ $item->pivot->qty }} kali</td>
                                    <th>
                                        <span id="ed{{ $item->id }}">
                                            {{ date('M Y', strtotime($item->pivot->end_at)) }}
                                        </span>
                                        <a href="#" id="edit{{ $item->id }}" class="icon mr-2 edit-expiry"
                                            data-expiry="{{ $item->pivot->end_at }}" data-potongan="{{ $item->id }}"
                                            data-qty="{{ $item->pivot->qty }}" title="Edit">
                                            <i class="fe fe-edit text-warning"></i>
                                        </a>
                                    </th>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="5">tidak ada potongan</td>
                                </tr>
                                @endforelse
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

    $('#newKeluarga').click(function () {
        $('.modal-title').text('Tambah Keluarga');
        $('#formKeluarga').modal('show');
        $('input[name=_method]').val('POST');
        $('#formKeluarga form')[0].reset();
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
                if (save_method == 'PUT') {
                    $('#r'+ data.id +'').html('<td>'+ data.nama +'</td><td><strong>'+ data.status_keluarga.status +'</strong></td><td><strong>'+ data.atk +'</strong></td><td><a class="icon mr-2" onclick="editKeluarga('+ data.id +')" title="edit"><i class="fe fe-edit"></i></a><a class="icon" onclick="hapusKeluarga('+ data.id +')" title="hapus"><i class="fe fe-trash"></i></a></td>');
                }
                if (save_method == 'POST') {
                    $('#row').append('<tr id="r'+ data.id +'"><td>'+ data.nama +'</td><td><strong>'+ data.status_keluarga.status +'</strong></td><td><strong>'+ data.atk +'</strong></td><td><a class="icon mr-2" onclick="editKeluarga('+ data.id +')" title="edit"><i class="fe fe-edit"></i></a><a class="icon" onclick="hapusKeluarga('+ data.id +')" title="hapus"><i class="fe fe-trash"></i></a></td></tr>');
                }
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
        $('#formKeluarga form')[0].reset();
        $('input[name=_method]').val('PUT');
        $('#select2').remove();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#formKeluarga').modal('show');
                $('input[name=id]').val(data.id);
                var date = data.tanggal_lahir;
                var arr = date.split("-");
                var atk = data.atk;
                var atk = atk.split("-");
                console.log(atk);
                $('input[name=nama]').val(data.nama);
                $('#birth_day').val(arr[2]);
                $('#birth_month').val(arr[1]);
                $('#birth_year').val(arr[0]);
                $('#atk_day').val(atk[2]);
                $('#atk_month').val(atk[1]);
                $('#atk_year').val(atk[0]);
                $('#status_keluarga').val(data.status_keluarga_id);
                var atp = data.akhir_tunj_pendidikan;
                var atp = atp.split("-");
                console.log(atp);
                $('#atp_day').val(atp[2]);
                $('#atp_month').val(atp[1]);
                $('#atp_year').val(atp[0]);
                $('input[name=tunjangan_pendidikan]').val(data.tunjangan_pendidikan);
                if (data.status_keluarga_id == '3') {
                    $('#tunj_pendidikan').show();
                }
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

    $('.edit-expiry').click(function () {
        var date = $(this).data('expiry').split('-');
        $('#end_month').val(date[1]);
        $('#end_year').val(date[0]);
        $('input[name=potongan_id]').val($(this).data('potongan'));
        $('#qty').val($(this).data('qty'));
        $('#expiryDate').modal('show');
    });

    $('#expiryDate form').submit(function(e) {
        e.preventDefault();
        var url = '{{ route('dash.potongan.updatePivote') }}';

        $.ajax({
            url: url,
            type: "PUT",
            data: $('#expiryDate form').serialize(),
            success: function (data) {
                $('#qty'+ data.id).text(data.qty);
                $('#ed'+ data.id).text(data.end_at_format);
                $('#edit'+ data.id).data('expiry', data.end_at);
                $('#edit'+ data.id).data('qty', data.qty);
                $('#expiryDate').modal('hide');
                toastr.success('Expiry date berhasil diupdate', "Success");
            },
            error: function () {
                toastr.error('Gagal memproses data', 'Failed');
            }
        });
    });
</script>
@endpush
