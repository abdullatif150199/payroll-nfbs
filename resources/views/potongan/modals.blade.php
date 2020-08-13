{{-- Modal tambahPotongan --}}
<div class="modal fade" id="tambahPotongan">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Potongan</label>
                                <select name="potongan_id" class="form-control select2 cari" data-width="100%"></select>
                            </div>
                        </div>
                    </div>
                    <div class="form-label">Jangka Waktu Sampai</div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <select name="end_at[month]" class="form-control" required>
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
                                <select name="end_at[year]" class="form-control" required>
                                    <option value="">Pilih Tahun</option>
                                    @for ($i=date('Y'); $i <= date('Y') + 50; $i++) <option value="{{$i}}">{{$i}}
                                        </option>
                                        @endfor
                                </select>
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

{{-- Modal daftarPotongan --}}
<div class="modal fade" id="daftarPotongan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Potongan</h3>
                                <div class="card-options">
                                    <a onclick="newPotongan()" class="btn btn-outline-primary btn-sm"><i
                                            class="fe fe-plus"></i> Tambah</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowra table-hover"
                                        id="tableDaftarPotongan">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Potongan</th>
                                                <th>Jumlah Potongan</th>
                                                <th>Type</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach ($potongan as $pot)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pot->nama_potongan }}</td>
                                                <td>
                                                    @if ($pot->type === 'decimal')
                                                    {{ number_format($pot->jumlah_potongan) }}
                                                    @else
                                                    @php
                                                    $ex = explode('*&', $pot->jumlah_potongan)
                                                    @endphp
                                                    {{ $ex[0]*100 . '% ' . $ex[1] }}
                                                    @endif
                                                </td>
                                                <td>{{ $pot->type }}</td>
                                                <td class="text-center">
                                                    <a class="icon mr-2" onclick="editPotongan({{ $pot->id }})"
                                                        data-toggle="tooltip" title="edit">
                                                        <i class="fe fe-edit"></i>
                                                    </a>
                                                    <a class="icon"
                                                        onclick="hapusPotongan({{ $pot->id .",'". $pot->nama_potongan ."'" }})"
                                                        data-toggle="tooltip" title="hapus">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

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
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>

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

{{-- Modal delete --}}
<div class="modal fade" id="modalDelete">
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
