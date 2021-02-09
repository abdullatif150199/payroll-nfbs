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

{{-- Modal keluarga --}}
<div class="modal fade" id="formKeluarga">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Keluarga</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form>
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <input type="hidden" name="karyawan_id" value="{{ $data->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Nama Keluarga</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="row gutters-xs">
                                    <div class="col-3">
                                        <select id="birth_day" name="birth[day]" class="form-control custom-select"
                                            required>
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++) <option value="{{sprintf('%02d', $i)}}">
                                                {{sprintf('%02d', $i)}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select id="birth_month" name="birth[month]" class="form-control custom-select"
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
                                        <select id="birth_year" name="birth[year]" class="form-control custom-select"
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Status Keluarga</label>
                                <select name="status_keluarga_id" id="status_keluarga" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach (App\Models\StatusKeluarga::pluck('id', 'status') as $key => $value)
                                    <option value="{{ $value }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="tunj_pendidikan" style="display: none">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Jml Tunjangan Pendidikan</label>
                                    <input type="text" class="form-control" name="tunjangan_pendidikan"
                                        data-mask="000,000,000" data-mask-reverse="true" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Akhir Tunjangan Pendidikan</label>
                                    <div class="row gutters-xs">
                                        <div class="col-3">
                                            <select id="atp_day" name="atp[day]" class="form-control custom-select">
                                                <option value="">Hari</option>
                                                @for ($i=1; $i <= 31; $i++) <option value="{{sprintf('%02d', $i)}}">
                                                    {{sprintf('%02d', $i)}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <select id="atp_month" name="atp[month]" class="form-control custom-select">
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
                                            <select id="atp_year" name="atp[year]" class="form-control custom-select">
                                                <option value="">Tahun</option>
                                                @for ($i=date('Y'); $i <= date('Y') + 50; $i++) <option value="{{$i}}">
                                                    {{$i}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Akhir Tunjangan Keluarga</label>
                                <div class="row gutters-xs">
                                    <div class="col-3">
                                        <select id="atk_day" name="atk[day]" class="form-control custom-select">
                                            <option value="">Hari</option>
                                            @for ($i=1; $i <= 31; $i++) <option value="{{sprintf('%02d', $i)}}">
                                                {{sprintf('%02d', $i)}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <select id="atk_month" name="atk[month]" class="form-control custom-select">
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
                                        <select id="atk_year" name="atk[year]" class="form-control custom-select">
                                            <option value="">Tahun</option>
                                            @for ($i=date('Y'); $i <= date('Y') + 50; $i++) <option value="{{$i}}">
                                                {{$i}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submit-keluarga">Tambah</button>

                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="hapusKeluarga">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Keluarga</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" name="id">
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Yakin</button>

                </div>
            </form>

        </div>
    </div>
</div>
