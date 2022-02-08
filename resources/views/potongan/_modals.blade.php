{{-- Modal formPotongan --}}
<div class="modal fade" id="formPotongan">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post" id="formNewPotongan">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Nama Potongan</label>
                                <input type="text" name="nama_potongan" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Jenis</label>
                                <select class="form-control custom-select" name="type" id="type" required>
                                    <option value="">Pilih</option>
                                    <option value="percent">Percent</option>
                                    <option value="decimal">Desimal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="decimal" style="display:none;">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Jumlah Potongan</label>
                                <input type="text" name="jumlah_potongan" class="form-control" data-mask="000.000.000"
                                    data-mask-reverse="true" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="percent" style="display:none;">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Jumlah Potongan</label>
                                <div class="input-group">
                                    <input type="text" name="jumlah_persentase" class="form-control text-right"
                                        data-mask="000" data-mask-reverse="true" autocomplete="off">
                                    <span class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">dari</span>
                                    </span>
                                    <select class="form-control" name="jenis_persentase">
                                        <option value="">Pilih</option>
                                        <option value="&GAPOK">GAJI POKOK</option>
                                        <option value="&GATOT">GAJI TOTAL</option>
                                        <option value="&GAFUN">GAJI POKOK + TUNJ FUNGSIONAL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Rekening Cover</label>
                                <select class="form-control custom-select" name="rekening_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($rekening as $rek)
                                    <option value="{{ $rek->id }}">{{ $rek->atas_nama .' ('. $rek->keterangan .')' }}
                                    </option>
                                    @endforeach
                                </select>
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

{{-- Modal hapusPotongan --}}
<div class="modal fade" id="hapusPotongan">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Potongan</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <strong>Yakin ingin menghapus?</strong>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-primary">Ya</button>
                </form>
            </div>

        </div>
    </div>
</div>
