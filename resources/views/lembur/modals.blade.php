{{-- Modal formLembur --}}
<div class="modal fade" id="formLembur">
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
                    <div class="row" id="select2">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <select name="karyawan_id" class="form-control select2 cari" data-width="100%"
                                    required></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Jumlah Jam</label>
                                <input type="number" name="jumlah_jam" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Tanggal</label>
                                <select name="day" class="form-control" required>
                                    <option value=""></option>
                                    @for ($i=1; $i <= 31; $i++) <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Bulan</label>
                                <select name="month" class="form-control" required>
                                    <option value=""></option>
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
                                <select name="year" class="form-control" required>
                                    <option value=""></option>
                                    @for ($i=2018; $i <= date('Y'); $i++) <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Hari lembur</label>
                                <select name="type" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="day">Hari kerja</option>
                                    <option value="week">Hari libur</option>
                                    <option value="holi">Hari Libur Semester/Hari raya</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="Opsional">
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

<div class="modal fade" id="persetujuanLembur">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Persetujuan Lembur</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id">
                <input type="hidden" name="day">
                <input type="hidden" name="month">
                <input type="hidden" name="year">
                <input type="hidden" name="type">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Jumlah Jam</label>
                                <input type="number" name="jumlah_jam" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Persetujuan</label>
                                <select class="form-control" name="status" required>
                                    <option value=""></option>
                                    <option value="approve">Setujui</option>
                                    <option value="disapprove">Tidak Setuju</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-danger">Yakin</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="hapusLembur">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Lembur</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id">
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-danger">Yakin</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                </div>
            </form>

        </div>
    </div>
</div>
