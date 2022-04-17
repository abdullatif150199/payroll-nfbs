<div class="modal fade" id="unduhScanlog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Unduh Scanlog</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post" action="{{ route('dash.scanlog.unduh') }}">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Dari</label>
                                <input type="text" name="dari_tanggal" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Sampai</label>
                                <input type="text" name="sampai_tanggal" class="form-control datepicker">
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
