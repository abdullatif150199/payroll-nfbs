{{-- Modal konfirmasi --}}
<div class="modal fade" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gaji Untuk Bulan dan Tahun:</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post" action="{{ route('dash.calculateGaji') }}">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Bulan</label>
                                <select name="bulan" class="form-control" required>
                                    <option value="">Pilih Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Augustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Tahun</label>
                                <select name="tahun" class="form-control" required>
                                    <option value="">Pilih Tahun</option>
                                    @for ($i=2018; $i <= date('Y'); $i++)
                                        <option {{ date('Y') == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Yakin</button>

                </div>
            </form>

        </div>
    </div>
</div>
