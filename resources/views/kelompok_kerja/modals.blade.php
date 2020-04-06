{{-- Modal formKelompok --}}
<div class="modal fade" id="formKelompok">
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
                                <label class="form-label">Grade</label>
                                <input type="text" name="grade" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Persen</label>
                                <div class="input-group">
                                    <input type="number" name="persen" step="any" class="form-control" placeholder="Persentase" aria-describedby="basic-addon2">
                                    <span class="input-group-append" id="basic-addon2">
                                        <span class="input-group-text">&percnt; dari GAPOK</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Amount Kinerja Normal</label>
                                <input type="number" name="kinerja_normal" class="form-control">
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
