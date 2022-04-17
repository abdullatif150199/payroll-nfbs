{{-- Modal formScanlog --}}
<div class="modal fade" id="formScanlog">
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

<div class="modal fade" id="hapusformScanlog">
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
