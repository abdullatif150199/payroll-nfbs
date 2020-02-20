{{-- Modal formDevice --}}
<div class="modal fade" id="formDevice">
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
                                <label class="form-label">IP Server</label>
                                <input type="text" name="server_ip" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Port Server</label>
                                <input type="text" name="server_port" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Serial Number Fingerspot</label>
                                <input type="text" name="serial_number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Tipe</label>
                                <select name="tipe" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="1">non shift</option>
                                    <option value="2">shift</option>
                                </select>
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

<div class="modal fade" id="hapusDevice">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Device Fingerprint</h4>
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
