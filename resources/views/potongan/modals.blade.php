{{-- Modal Form --}}
<div class="modal" id="modalForm">
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
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-label">Nama Potongan</label>
                          <input type="text" id="nama_potongan" name="nama_potongan" class="form-control" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Jumlah Potongan</label>
                        <input type="text" id="jumlah_potongan" name="jumlah_potongan" class="form-control" data-mask="000.000.000.000.000" data-mask-reverse="true" autocomplete="off" maxlength="22" required>
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

{{-- Modal delete --}}
<div class="modal" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <div class="modal-body">

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
