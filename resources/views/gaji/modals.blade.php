{{-- Modal unduh --}}
<div class="modal fade" id="unduh-gaji">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gaji Untuk Bulan:</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post" action="{{ route('dash.gaji.unduh') }}">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Bulan</label>
                                <select name="bulan" class="form-control" required>
                                    <option value="">Pilih Bulan</option>
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
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Tahun</label>
                                <select name="tahun" class="form-control" required>
                                    <option value="">Pilih Tahun</option>
                                    @for ($i=2018; $i <= date('Y'); $i++) <option {{ date('Y') == $i ? 'selected' : ''}}
                                        value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Yakin</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>

        </div>
    </div>
</div>

{{-- Modal proses gaji --}}
<div class="modal fade" id="proses-ulang">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gaji Untuk Bulan:</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Bulan</label>
                                <select name="bulan" class="form-control" required>
                                    <option value="">Pilih Bulan</option>
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
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Tahun</label>
                                <select name="tahun" class="form-control" required>
                                    <option value="">Pilih Tahun</option>
                                    @for ($i=2018; $i <= date('Y'); $i++) <option {{ date('Y') == $i ? 'selected' : ''}}
                                        value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Yakin</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>

        </div>
    </div>
</div>

{{-- Detail Gaji --}}
<div class="modal fade" id="detail-gaji">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div id="bulan"></div>
                <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Gaji Pokok</label>
                        <input type="text" name="gaji_pokok" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Tunjangan Jabatan</label>
                        <input type="text" name="tunjangan_jabatan" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Tunjangan Fungsional</label>
                        <input type="text" name="tunjangan_fungsional" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Tunjangan Struktural</label>
                        <input type="text" name="tunjangan_struktural" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Tunjangan Kinerja</label>
                        <input type="text" name="tunjangan_kinerja" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Tunjangan Pendidikan</label>
                        <input type="text" name="tunjangan_pendidikan" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Tunjangan Istri</label>
                        <input type="text" name="tunjangan_istri" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Tunjangan Anak</label>
                        <input type="text" name="tunjangan_anak" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Tunjangan Hari Raya</label>
                        <input type="text" name="tunjangan_hari_raya" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Lembur</label>
                        <input type="text" name="lembur" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Lain lain</label>
                        <input type="text" name="lain_lain" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Insentif</label>
                        <input type="text" name="insentif" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Potongan</label>
                        <input type="text" name="potongan" class="form-control is-invalid" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Gaji Akhir</label>
                        <input type="text" name="gaji_total" class="form-control is-valid" disabled>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
