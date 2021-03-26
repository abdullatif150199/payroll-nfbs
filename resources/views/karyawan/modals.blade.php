{{-- Modal Form --}}
<div class="modal fade" id="formKaryawan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post" id="formEdit">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">NIK</label>
                                <input class="form-control" name="nik" id="nik" required>
                            </div>
                        </div>
                    </div>

                    <div class="row bg-blue-lightest">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control custom-select" name="jenis_kelamin" id="jenis_kelamin"
                                    required>
                                    <option value="">Pilih</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="row gutters-xs">
                                    <div class="col-3">
                                        <select name="birth[day]" class="form-control custom-select" id="day" required>
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++) <option value="{{sprintf('%02d', $i)}}">
                                                {{sprintf('%02d', $i)}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select name="birth[month]" class="form-control custom-select" id="month"
                                            required>
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
                                        <select name="birth[year]" class="form-control custom-select" id="year"
                                            required>
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
                                <select class="form-control custom-select" name="pendidikan_terakhir"
                                    id="pendidikan_terakhir">
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
                                <input type="text" name="jurusan" class="form-control" id="jurusan">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Tahun Lulus</label>
                                <select name="tahun_lulus" class="form-control custom-select" id="tahun_lulus">
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
                                <input type="text" name="nama_pendidikan" class="form-control" id="nama_pendidikan">
                            </div>
                        </div>
                    </div>

                    <div class="row bg-blue-lightest">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status Pernikahan</label>
                                <select class="form-control custom-select" name="status_pernikahan"
                                    id="status_pernikahan">
                                    <option value="">Pilih</option>
                                    <option value="B">Belum Menikah</option>
                                    <option value="M">Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">No HP</label>
                                <input type="text" name="no_hp" class="form-control" data-mask="0000 0000 0000"
                                    maxlength="14" id="no_hp">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" placeholder="Masukan Alamat di Sini..."
                                    id="alamat" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row bg-blue-lightest">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Masuk Kerja</label>
                                <div class="row gutters-xs">
                                    <div class="col-3">
                                        <select name="tanggal_masuk[day]" class="form-control custom-select" id="tm_day"
                                            required>
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++) <option value="{{sprintf('%02d', $i)}}">
                                                {{sprintf('%02d', $i)}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select name="tanggal_masuk[month]" class="form-control custom-select"
                                            id="tm_month" required>
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
                                        <select name="tanggal_masuk[year]" class="form-control custom-select"
                                            id="tm_year" required>
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
                                        <select name="akhir_kontrak[day]" class="form-control custom-select"
                                            id="ak_day">
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++) <option value="{{sprintf('%02d', $i)}}">
                                                {{sprintf('%02d', $i)}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select name="akhir_kontrak[month]" class="form-control custom-select"
                                            id="ak_month">
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
                                        <select name="akhir_kontrak[year]" class="form-control custom-select"
                                            id="ak_year">
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
                                <select class="form-control custom-select" name="golongan" id="golongan" required>
                                    <option value="">Pilih</option>
                                    @foreach ($golongan as $gol)
                                    <option value="{{ $gol->id }}">{{ $gol->kode_golongan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Jabatan</label>
                                <select class="form-control custom-select selectize-select" name="jabatan[]"
                                    id="jabatan" required>
                                    <option value="">Pilih</option>
                                    @foreach ($jabatan as $jab)
                                    <option value="{{ $jab->id }}">{{ $jab->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Bidang</label>
                                <select class="form-control custom-select selectize-select" name="bidang[]" id="bidang"
                                    required>
                                    <option value="">Pilih</option>
                                    @foreach ($bidang as $bid)
                                    <option value="{{ $bid->id }}">{{ $bid->nama_bidang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Unit</label>
                                <select class="form-control custom-select selectize-select" name="unit[]" id="unit"
                                    required>
                                    <option value="">Pilih</option>
                                    @foreach ($unit as $uni)
                                    <option value="{{ $uni->id }}">{{ $uni->nama_unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row bg-blue-lightest">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Status Kerja</label>
                                <select name="status_kerja" id="status_kerja" class="form-control custom-select"
                                    required>
                                    <option value="">Pilih</option>
                                    @foreach ($status_kerja as $stat)
                                    <option value="{{ $stat->id }}">{{ $stat->nama_status_kerja }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Kelompok Kerja</label>
                                <select name="kelompok_kerja" id="kelompok_kerja" class="form-control custom-select"
                                    required>
                                    <option value="">Pilih</option>
                                    @foreach ($kelompok_kerja as $kel)
                                    <option value="{{ $kel->id }}">{{ $kel->grade }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Status Pegawai</label>
                                <select name="status" id="status" class="form-control custom-select">
                                    <option value="">Pilih</option>
                                    <option value="1">Guru</option>
                                    <option value="2">Non Guru</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Jam Ajar</label>
                                <select name="jam_ajar" id="jam_ajar" class="form-control custom-select" required>
                                    <option value="">Pilih</option>
                                    @foreach ($jam_ajar as $jam)
                                        <option value="{{ $jam->id }}">{{ $jam->jml . ' (' . $jam->ket .')' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Jam Kerja Per Pekan</label>
                                <select name="jam_perpekan" id="jam_perpekan" class="form-control custom-select"
                                    required>
                                    <option value="">Pilih</option>
                                    @foreach ($jam_perpekan as $jam)
                                    <option value="{{ $jam->id }}">{{ $jam->jml_jam . ' (' . $jam->keterangan .')' }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nama Bank</label>
                                <input type="text" name="nama_bank" class="form-control" id="nama_bank">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">No Rekening</label>
                                <input type="text" name="no_rekening" class="form-control"
                                    data-mask="0000 0000 0000 0000" maxlength="14" id="no_rekening">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Rekening Atas Nama</label>
                                <input type="text" name="rekening_atas_nama" class="form-control"
                                    id="rekening_atas_nama">
                            </div>
                        </div>
                    </div>

                    <div class="row bg-blue-lightest">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jenis PPH 21</label>
                                <select name="tax_id" class="form-control custom-select" id="tax_id">
                                    <option value="">Pilih</option>
                                    @foreach ($taxes as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 bk" style="display: none">
                            <div class="form-group">
                                <label class="form-label">Tanggal Berhenti Kerja</label>
                                <div class="row gutters-xs">
                                    <div class="col-3">
                                        <select name="tanggal_keluar[day]" class="form-control custom-select"
                                            id="tk_day">
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++) <option value="{{sprintf('%02d', $i)}}">
                                                {{sprintf('%02d', $i)}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select name="tanggal_keluar[month]" class="form-control custom-select"
                                            id="tk_month">
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
                                        <select name="tanggal_keluar[year]" class="form-control custom-select"
                                            id="tk_year">
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
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </form>

        </div>
    </div>
</div>
{{-- End form karyawan --}}

<div class="modal fade" id="resignKaryawan">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Resign Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                {{ csrf_field() }} {{ method_field('PUT') }}
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Ya</button>

                </div>
            </form>

        </div>
    </div>
</div>
