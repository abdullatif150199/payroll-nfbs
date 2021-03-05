{{-- Modal --}}
<div class="modal fade" id="formJadwal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <input type="hidden" name="req" value="store-jadwal">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Hari</label>
                                <select name="day_name" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="Sunday">Ahad</option>
                                    <option value="Monday">Senin</option>
                                    <option value="Tuesday">Selasa</option>
                                    <option value="Wednesday">Rabu</option>
                                    <option value="Thursday">Kamis</option>
                                    <option value="Friday">Jumat</option>
                                    <option value="Saturday">Sabtu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Waktu Mulai</label>
                                <input type="text" name="start_time_at" class="form-control"
                                    placeholder="contoh. 07:00">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Waktu Selesai</label>
                                <input type="text" name="end_time_at" class="form-control" placeholder="contoh. 07:20">
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

<div class="modal fade" id="hapusJadwal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                {{ csrf_field() }} {{ method_field('DELETE') }}
                <input type="hidden" name="id">
                <input type="hidden" name="req" value="destroy-jadwal">
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
