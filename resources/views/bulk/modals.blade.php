{{-- Modal konfirmasi --}}
<div class="modal fade" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post" action="{{ route('dash.bulkUpload.store') }}">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <input type="hidden" name="id">
                    <p>Yakin ingin menambahkan data?</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Yakin</button>
                    <button type="submit" class="btn btn-primary">Batal</button>

                </div>
            </form>

        </div>
    </div>
</div>
