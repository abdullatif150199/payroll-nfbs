{{-- Modal Form create --}}
<div class="modal fade" id="modalCreate">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form action="{{ route('storeKaryawan') }}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control custom-select" name="jenis_kelamin" required>
                                    <option value="">Pilih</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">NIK</label>
                                <input type="text" name="nik" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="row gutters-xs">
                                    <div class="col-3">
                                        <select name="birth[day]" class="form-control custom-select" required>
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select name="birth[month]" class="form-control custom-select" required>
                                            <option value="">Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Augustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="birth[year]" class="form-control custom-select" required>
                                            <option value="">Tahun</option>
                                            @for ($i=date('Y'); $i >= date('Y') - 100; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Pendidikan Terakhir</label>
                                <select class="form-control custom-select" name="pendidikan_terakhir" required>
                                    <option value="">Pilih</option>
                                    <option value="TS">Tidak Sekolah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Tahun Lulus</label>
                                <select name="tahun_lulus" class="form-control custom-select">
                                    <option value="">Tahun</option>
                                    @for ($i=date('Y'); $i >= date('Y') - 100; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nama Pendidikan</label>
                                <input type="text" name="nama_pendidikan" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status Pernikahan</label>
                                <select class="form-control custom-select" name="status_pernikahan">
                                    <option value="">Pilih</option>
                                    <option value="B">Belum Menikah</option>
                                    <option value="M">Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">No HP dg Code Area</label>
                                <input type="text" name="no_hp" class="form-control" data-mask="(00) 0000 0000 000" data-mask-clearifnotmatch="true" autocomplete="off" maxlength="14">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" required>Masukan Alamat di Sini...</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Masuk Kerja</label>
                                <div class="row gutters-xs">
                                    <div class="col-3">
                                        <select name="tanggal_masuk[day]" class="form-control custom-select" required>
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select name="tanggal_masuk[month]" class="form-control custom-select" required>
                                            <option value="">Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Augustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="tanggal_masuk[year]" class="form-control custom-select" required>
                                            <option value="">Tahun</option>
                                            @for ($i=date('Y'); $i >= date('Y') - 100; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status Kerja</label>
                                <select name="status_kerja" class="form-control custom-select" required>
                                    <option value="">Pilih</option>
                                    <option value="GTY">GTY</option>
                                    <option value="PTY">PTY</option>
                                    <option value="PPTY">PPTY</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Golongan</label>
                                <select class="form-control custom-select" name="golongan" required>
                                    <option value="">Pilih</option>
                                    @php
                                    $a = ['A', 'B', 'C', 'D', 'E', 'F'];
                                    @endphp
                                    @foreach ($a as $b)
                                        @for ($i=1; $i < 10; $i++)
                                            <option value="{{ $i.$b }}">{{ $i.$b }}</option>
                                        @endfor
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Jabatan</label>
                                <select class="form-control custom-select" name="jabatan" required>
                                    <option value="">Pilih</option>
                                    <option value="guru">Guru</option>
                                    <option value="web developer">Web Developer</option>
                                    <option value="perawatan">Perawatan</option>
                                    <option value="SDA">SDA</option>
                                    <option value="security">Security</option>
                                    <option value="keuangan">Keuangan</option>
                                    <option value="kepala bidang">Kepala Bidang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Bidang</label>
                                <select class="form-control custom-select" name="bidang" required>
                                    <option value="">Pilih</option>
                                    <option value="HRD">HRD</option>
                                    <option value="LRC">LRC</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SEKUM">SEKUM</option>
                                    <option value="RT">RT</option>
                                    <option value="BINSAN">BINSAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Unit</label>
                                <select class="form-control custom-select" name="unit" required>
                                    <option value="">Pilih</option>
                                    <option value="humas">Humas</option>
                                    <option value="bahasa">bahasa</option>
                                    <option value="SDA">SDA</option>
                                    <option value="PPG">PPG</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nama Bank</label>
                                <input type="text" name="nama_bank" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">No Rekening</label>
                                <input type="text" name="no_rekening" class="form-control" data-mask="0000 0000 0000 0000" data-mask-clearifnotmatch="true" autocomplete="off" maxlength="14">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Rekening Atas Nama</label>
                                <input type="text" name="rekening_atas_nama" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>

                </div>
            </form>

        </div>
    </div>
</div>

{{-- Modal Form Edit --}}
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control custom-select" name="jenis_kelamin" required>
                                    <option value="">Pilih</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="row gutters-xs">
                                    <div class="col-3">
                                        <select name="birth[day]" class="form-control custom-select" required>
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select name="birth[month]" class="form-control custom-select" required>
                                            <option value="">Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Augustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="birth[year]" class="form-control custom-select" required>
                                            <option value="">Tahun</option>
                                            @for ($i=date('Y'); $i >= date('Y') - 100; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Pendidikan Terakhir</label>
                                <select class="form-control custom-select" name="pendidikan_terakhir" required>
                                    <option value="">Pilih</option>
                                    <option value="TS">Tidak Sekolah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Tahun Lulus</label>
                                <select name="tahun_lulus" class="form-control custom-select">
                                    <option value="">Tahun</option>
                                    @for ($i=date('Y'); $i >= date('Y') - 100; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nama Pendidikan</label>
                                <input type="text" name="nama_pendidikan" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status Pernikahan</label>
                                <select class="form-control custom-select" name="status_pernikahan">
                                    <option value="">Pilih</option>
                                    <option value="B">Belum Menikah</option>
                                    <option value="M">Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">No HP dg Code Area</label>
                                <input type="text" name="no_hp" class="form-control" data-mask="(00) 0000 0000 000" data-mask-clearifnotmatch="true" autocomplete="off" maxlength="14">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" required>Masukan Alamat di Sini...</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Masuk Kerja</label>
                                <div class="row gutters-xs">
                                    <div class="col-3">
                                        <select name="tanggal_masuk[day]" class="form-control custom-select" required>
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select name="tanggal_masuk[month]" class="form-control custom-select" required>
                                            <option value="">Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Augustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="tanggal_masuk[year]" class="form-control custom-select" required>
                                            <option value="">Tahun</option>
                                            @for ($i=date('Y'); $i >= date('Y') - 100; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Berhenti Kerja</label>
                                <div class="row gutters-xs">
                                    <div class="col-3">
                                        <select name="tanggal_keluar[day]" class="form-control custom-select">
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select name="tanggal_keluar[month]" class="form-control custom-select">
                                            <option value="">Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Augustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="tanggal_keluar[year]" class="form-control custom-select">
                                            <option value="">Tahun</option>
                                            @for ($i=date('Y'); $i >= date('Y') - 100; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Golongan</label>
                                <select class="form-control custom-select" name="golongan" required>
                                    <option value="">Pilih</option>
                                    @php
                                    $a = ['A', 'B', 'C', 'D', 'E', 'F'];
                                    @endphp
                                    @foreach ($a as $b)
                                        @for ($i=1; $i < 10; $i++)
                                            <option value="{{ $i.$b }}">{{ $i.$b }}</option>
                                        @endfor
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Jabatan</label>
                                <select class="form-control custom-select" name="jabatan" required>
                                    <option value="">Pilih</option>
                                    <option value="guru">Guru</option>
                                    <option value="web developer">Web Developer</option>
                                    <option value="perawatan">Perawatan</option>
                                    <option value="SDA">SDA</option>
                                    <option value="security">Security</option>
                                    <option value="keuangan">Keuangan</option>
                                    <option value="kepala bidang">Kepala Bidang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Bidang</label>
                                <select class="form-control custom-select" name="bidang" required>
                                    <option value="">Pilih</option>
                                    <option value="HRD">HRD</option>
                                    <option value="LRC">LRC</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SEKUM">SEKUM</option>
                                    <option value="RT">RT</option>
                                    <option value="BINSAN">BINSAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Unit</label>
                                <select class="form-control custom-select" name="unit" required>
                                    <option value="">Pilih</option>
                                    <option value="humas">Humas</option>
                                    <option value="bahasa">bahasa</option>
                                    <option value="SDA">SDA</option>
                                    <option value="PPG">PPG</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nama Bank</label>
                                <input type="text" name="nama_bank" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">No Rekening</label>
                                <input type="text" name="no_rekening" class="form-control" data-mask="0000 0000 0000 0000" data-mask-clearifnotmatch="true" autocomplete="off" maxlength="14">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Rekening Atas Nama</label>
                                <input type="text" name="rekening_atas_nama" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status Kerja</label>
                                <select name="status_kerja" class="form-control custom-select" required>
                                    <option value="">Pilih</option>
                                    <option value="GTY">GTY</option>
                                    <option value="PTY">PTY</option>
                                    <option value="PPTY">PPTY</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control custom-select">
                                    <option value="">Pilih</option>
                                    <option value="1">Guru</option>
                                    <option value="2">Non Guru</option>
                                    <option value="3">Berhenti</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>

                </div>
            </form>

        </div>
    </div>
</div>
