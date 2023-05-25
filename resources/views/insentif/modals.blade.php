{{-- Modal formInsentif --}}
<div class="modal fade" id="formInsentif">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <input type="hidden" name="id">
                    <div class="row" id="select2">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <select name="karyawan_id" class="form-control select2 cari" data-width="100%"></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Jenis Insentif</label>
                                <select name="jenis_insentif" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="Inval">Inval</option>
                                    <option value="Kegiatan">Kegiatan</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="BINSAN">BINSAN</option>
                                    <option value="SEKUM">SEKUM</option>
                                    <option value="Bimbel">Bimbel</option>
                                    <option value="LRC-Bahasa">LRC-Bahasa</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="HRD-Humas">HRD-Humas</option>
                                    <option value="Pelayanan Umum">Pelayanan Umum</option>
                                    <option value="Rumah Tangga">Rumah Tangga</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Bulan</label>
                                <select name="month" class="form-control" required>
                                    <option value=""></option>
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
                                <select name="year" class="form-control" required>
                                    <option value=""></option>
                                    @for ($i=2018; $i <= date('Y'); $i++) <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" required>
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

<div class="modal fade" id="hapusInsentif">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Insentif</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                {{ csrf_field() }} {{ method_field('DELETE') }}
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>

                </div>
            </form>

        </div>
    </div>
</div>
