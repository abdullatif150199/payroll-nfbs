{{-- Modal unduh --}}
<div class="modal fade" id="unduh-gaji">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gaji Untuk Bulan:</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post" action="{{ route('dash.gaji.unduh') }}">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
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
                                    @for ($i=2018; $i <= date('Y'); $i++) <option {{ date('Y') == $i ? 'selected' : ''}}
                                        value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Yakin</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>

        </div>
    </div>
</div>

{{-- Modal proses gaji --}}
<div class="modal fade" id="proses-ulang">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gaji Untuk Bulan:</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
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
                                    @for ($i=2018; $i <= date('Y'); $i++) <option {{ date('Y') == $i ? 'selected' : ''}}
                                        value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Yakin</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>

        </div>
    </div>
</div>

{{-- Detail Gaji --}}
<div class="modal fade" id="detail-gaji">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="card">
                    <table class="table card-table table-vcenter">
                        <tbody>
                            <tr>
                                <td>
                                    Gaji Pokok
                                </td>
                                <td class="text-right">
                                    <strong id="gaji_pokok"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tunjangan Jabatan
                                </td>
                                <td class="text-right">
                                    <strong id="tunjangan_jabatan"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tunjangan Fungsional
                                </td>
                                <td class="text-right">
                                    <strong id="tunjangan_fungsional"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tunjangan Struktural
                                </td>
                                <td class="text-right">
                                    <strong id="tunjangan_struktural"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tunjangan Kinerja
                                </td>
                                <td class="text-right">
                                    <strong id="tunjangan_kinerja"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tunjangan Pendidikan
                                </td>
                                <td class="text-right">
                                    <strong id="tunjangan_pendidikan"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tunjangan Istri
                                </td>
                                <td class="text-right">
                                    <strong id="tunjangan_istri"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tunjangan Anak
                                </td>
                                <td class="text-right">
                                    <strong id="tunjangan_anak"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Insentif
                                </td>
                                <td class="text-right">
                                    <strong id="insentif"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Lembur
                                </td>
                                <td class="text-right">
                                    <strong id="lembur"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Lain-lain
                                </td>
                                <td class="text-right">
                                    <strong id="lain_lain"></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Potongan
                                </td>
                                <td class="text-right">
                                    <strong id="potongan"></strong>
                                </td>
                            </tr>
                            <tr class="bg-info text-white">
                                <td>
                                    GAJI AKHIR
                                </td>
                                <td class="text-right">
                                    <strong id="gaji_total"></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
