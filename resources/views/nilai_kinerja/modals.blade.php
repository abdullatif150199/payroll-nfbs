{{-- Modal formNilaiKinerja --}}
<div class="modal fade" id="formNilaiKinerja">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                {{ csrf_field() }} {{ method_field('POST') }}
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Nilai</label>
                                <input type="text" name="nilai" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Nilai Minimal</label>
                                <div class="input-group">
                                    <input type="number" name="min_nilai" step="any" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col">
                            <div class="form-group">
                                <label class="form-label">Maksimal</label>
                                <div class="input-group">
                                    <input type="text" name="max_persen" step="any" class="form-control" placeholder="Persentase" aria-describedby="basic-addon2">
                                    <span class="input-group-append" id="basic-addon2">
                                        <span class="input-group-text">&percnt;</span>
                                    </span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Hasil yang diperoleh</label>
                                <div class="input-group">
                                    <input type="text" name="result_persen" step="any" class="form-control"
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
                    <button type="submit" class="btn btn-primary">Tambah</button>

                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="hapusNilaiKinerja">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Nilai Kinerja</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                {{ csrf_field() }} {{ method_field('DELETE') }}
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
