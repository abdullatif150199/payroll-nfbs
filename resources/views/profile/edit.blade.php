@extends('layouts.profile')
@section('content')
<div class="col-lg-8">
    <form class="card">
        <div class="card-body">
            <h3 class="card-title">Detail Profile</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="{{ $user->name }}" required>
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

            <div class="row bg-blue-lightest">
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
                                    @for ($i=1; $i <= 31; $i++) <option value="{{sprintf('%02d', $i)}}">
                                        {{sprintf('%02d', $i)}}</option>
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
                        <select class="form-control custom-select" name="pendidikan_terakhir">
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
                        <input type="text" name="nama_pendidikan" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row bg-blue-lightest">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Status Pernikahan</label>
                        <select class="form-control custom-select" name="status_pernikahan">
                            <option value="">Pilih</option>
                            <option value="B">Belum Menikah</option>
                            <option value="M">Menikah</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control" data-mask="0000 0000 0000"
                            maxlength="14">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" placeholder="Masukan Alamat di Sini..."
                            required></textarea>
                    </div>
                </div>
            </div>

            <div class="row bg-blue-lightest">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Tanggal Masuk Kerja</label>
                        <div class="row gutters-xs">
                            <div class="col-3">
                                <select name="tanggal_masuk[day]" class="form-control custom-select" required>
                                    <option value="">Hari</option>
                                    @for ($i=1; $i <= 31; $i++) <option value="{{sprintf('%02d', $i)}}">
                                        {{sprintf('%02d', $i)}}</option>
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
                        <label class="form-label">Akhir Kontrak Kerja</label>
                        <div class="row gutters-xs">
                            <div class="col-3">
                                <select name="akhir_kontrak[day]" class="form-control custom-select" required>
                                    <option value="">Hari</option>
                                    @for ($i=1; $i <= 31; $i++) <option value="{{sprintf('%02d', $i)}}">
                                        {{sprintf('%02d', $i)}}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="col-5">
                                <select name="akhir_kontrak[month]" class="form-control custom-select" required>
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
                                <select name="akhir_kontrak[year]" class="form-control custom-select" required>
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
                        <input type="text" class="form-control custom-select" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Jabatan</label>
                        <input type="text" class="form-control custom-select selectize-select" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Bidang</label>
                        <input type="text" class="form-control custom-select selectize-select" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Unit</label>
                        <input type="text" class="form-control custom-select selectize-select" disabled>
                    </div>
                </div>
            </div>

            <div class="row bg-blue-lightest">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Status Kerja</label>
                        <input type="text" class="form-control custom-select" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Kelompok Kerja</label>
                        <input type="text" class="form-control custom-select" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Status Karyawan</label>
                        <input type="text" class="form-control custom-select" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Jam Kerja Per Pekan</label>
                        <input type="text" class="form-control custom-select" disabled>
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
                        <input type="text" name="no_rekening" class="form-control"
                            data-mask="0000 0000 0000 0000" autocomplete="off" maxlength="14">
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
        {{-- <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div> --}}
    </form>
</div>
@endsection
