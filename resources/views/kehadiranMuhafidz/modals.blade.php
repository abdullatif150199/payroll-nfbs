{{-- Modal formKehadiran --}}
<div class="modal fade" id="formKehadiran">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-bs-dismiss="modal"></button>
            </div>

            <form method="post">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Tahfidz Subuh</label>
                                <input type="text" name="datang_subuh" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row shift">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Pulang</label>
                                <input type="text" name="pulang_subuh" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row shift">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Tahfidz Malam</label>
                                <input type="text" name="datang_malam" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Pulang</label>
                                <input type="text" name="pulang_malam" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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

