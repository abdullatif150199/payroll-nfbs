@extends('layouts.profile')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            Rincian Gaji
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Gaji Pokok</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->gaji_pokok) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Tunjangan Jabatan</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->tunjangan_jabatan) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Tunjangan Fungsional</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->tunjangan_fungsional) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Tunjangan Struktural</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->tunjangan_struktural) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Tunjangan Kinerja</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->tunjangan_kinerja) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Tunjangan Pendidikan</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->tunjangan_pendidikan) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Tunjangan Istri</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->tunjangan_istri) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Tunjangan Anak</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->tunjangan_anak) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Tunjangan Hari Raya</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->tunjangan_hari_raya) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Lembur</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->lembur) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Lain lain</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->lain_lain) }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Insentif</label>
                        <input type="text" class="form-control" value="{{ number_format($gaji->insentif) }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Potongan</label>
                        <input type="text" class="form-control is-invalid" value="{{ number_format($gaji->sum_potongan) }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Gaji Akhir</label>
                        <input type="text" class="form-control is-valid" value="{{ number_format($gaji->gaji_total) }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
