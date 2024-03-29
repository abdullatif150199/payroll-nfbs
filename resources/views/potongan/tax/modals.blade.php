{{-- Modal formTax --}}
<div class="modal fade" id="formTax">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Kode</label>
                                <input type="text" name="kode" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">PTKP Pertahun:</label>
                                <input type="text" name="ptkp_pertahun" class="form-control" data-mask="000,000,000"
                                    data-mask-reverse="true" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">PTKP Perbulan:</label>
                                <input type="text" name="ptkp_perbulan" class="form-control" data-mask="000,000,000"
                                    data-mask-reverse="true" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Persentase PPH 21</label>
                                <div class="input-group">
                                    <input type="number" name="persentase_pph21" class="form-control"
                                        placeholder="Persentase" aria-describedby="basic-addon2">
                                    <span class="input-group-append" id="basic-addon2">
                                        <span class="input-group-text">&percnt;</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Persentase Biaya Jabatan</label>
                                <div class="input-group">
                                    <input type="number" name="persentase_biaya_jabatan" class="form-control"
                                        placeholder="Persentase" aria-describedby="basic-addon2">
                                    <span class="input-group-append" id="basic-addon2">
                                        <span class="input-group-text">&percnt;</span>
                                    </span>
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

<div class="modal fade" id="hapusTax">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Pajak</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                {{ csrf_field() }} {{ method_field('DELETE') }}
                <input type="hidden" name="id">
                <div class="modal-body">
                    Yakin ingin menghapus?
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>

                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="unduhPajak">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Unduh Pajak Bulan:</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post" action="{{ route('dash.pajak.unduh') }}">
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
                                    @for ($i=2018; $i <= date('Y'); $i++) <option {{ date('Y')==$i ? 'selected' : '' }}
                                        value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Unduh</button>
                </div>
            </form>

        </div>
    </div>
</div>
