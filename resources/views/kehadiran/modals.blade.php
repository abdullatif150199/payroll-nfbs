{{-- Modal formKehadiran --}}
<div class="modal fade" id="formKehadiran">
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
                                <label class="form-label">Jam Masuk</label>
                                <input type="text" name="jam_masuk" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row shift">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Jam Istirahat</label>
                                <input type="text" name="jam_istirahat" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row shift">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Jam Kembali</label>
                                <input type="text" name="jam_kembali" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Jam Pulang</label>
                                <input type="text" name="jam_pulang" class="form-control">
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

<div class="modal fade" id="hapusKehadiran">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kehadiran Fingerprint</h4>
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

