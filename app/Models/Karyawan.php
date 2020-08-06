<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'user_id', 'golongan_id', 'status_kerja_id', 'kelompok_kerja_id', 'no_induk', 'nik', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'status_pernikahan', 'alamat', 'no_hp', 'nama_pendidikan', 'pendidikan_terakhir', 'jurusan', 'tahun_lulus',
        'tanggal_masuk', 'nama_bank', 'no_rekening', 'rekening_atas_nama', 'status', 'tipe_kerja', 'jam_perpekan_id'
    ];

    public function jabatan()
    {
        return $this->belongsToMany(Jabatan::class, 'jabatan_karyawan');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function bidang()
    {
        return $this->belongsToMany(Bidang::class, 'bidang_karyawan');
    }

    public function unit()
    {
        return $this->belongsToMany(Unit::class, 'karyawan_unit');
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }

    public function kehadiranHariIni()
    {
        return $this->hasOne(Kehadiran::class)->where('tanggal', date('Y-m-d'));
    }

    public function kehadiranKemarin()
    {
        $yesterday = date("Y-m-d", strtotime( '-1 days' ) );
        return $this->hasOne(kehadiran::class)->where('tanggal', $yesterday);
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }

    public function potongan()
    {
        return $this->belongsToMany(Potongan::class, 'karyawan_potongan');
    }

    public function lembur()
    {
        return $this->hasMany(Lembur::class);
    }

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class);
    }

    public function insentif()
    {
        return $this->hasMany(Insentif::class);
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class);
    }

    public function gajiTotalAkhir()
    {
        return $this->hasOne(Gaji::class)->latest();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusKerja()
    {
        return $this->belongsTo(StatusKerja::class);
    }

    public function kinerja()
    {
        return $this->hasMany(Kinerja::class);
    }

    public function persentaseKinerja()
    {
        return $this->belongsToMany(PersentaseKinerja::class, 'karyawan_persentase_kinerja');
    }

    public function jamPerpekan()
    {
        return $this->belongsTo(JamPerpekan::class);
    }

    public function kelompokKerja()
    {
        return $this->belongsTo(kelompokKerja::class);
    }

    // Get gaji Pokok
    public function getGajiPokokAttribute($value)
    {
        return $this->golongan->gaji_pokok;
    }

    // Get Tunjangan Anak
    public function getTunjAnakAttribute($value)
    {
        $anak = $this->keluarga()->tunjAnak()->get();
        $tot_persen = 0;
        foreach ($anak as $item) {
            $tot_persen += $item->statuskeluarga->persen;
        }

        return ($tot_persen * $this->gaji_pokok);
    }

    // Get Tunjangan Istri
    public function getTunjIstriAttribute($value)
    {
        if ($this->jenis_kelamin == 'L' && $this->status_pernikahan == 'M') {
            $istri = $this->keluarga()->tunjIstri()->get();
            $tot_persen = 0;
            foreach ($istri as $item) {
                $tot_persen += $item->statuskeluarga->persen;
            }

            return ($tot_persen * $this->gaji_pokok);
        } else {
            return 0;
        }
    }

    // Get Jml Anak
    public function getJmlAnakAttribute($value)
    {
        return $this->keluarga()->anak()->count();
    }

      // Get Jml Istri
    public function getJmlIstriAttribute($value)
    {
        return $this->keluarga()->istri()->count();
    }

    // Get Tunjangan Pendidikan Anak
    public function getTunjPendidikanAnakAttribute($value)
    {
        return $this->keluarga()->tunjPendidikanAnak()->sum('tunjangan_pendidikan');
    }

    // Get Tunjangan Jabatan
    public function getTunjJabatanAttribute($value)
    {
        return $this->jabatan->tunjangan_jabatan;
    }

    public function sumLoad()
    {
        return $this->jabatan()->sum('load');
    }

    // Get Tunjangan Struktural
    public function getTunjStrukturalAttribute($value)
    {
        if ($this->status == 1) {
            $load = ($this->sumLoad() + $this->jamPerpekan->jml_jam_ngajar) - $this->jamPerpekan->jml_jam;

            return $load > 0 ? ($load * setting('tarif_load')) : 0;
        }

        return ($this->sumLoad() * setting('tarif_load'));
    }

    // Get Tunjangan Fungsional
    public function getTunjFungsionalAttribute($value)
    {
        return ($this->gaji_pokok * $this->kelompokKerja->persen);
    }

    public function getGajiTotalAttribute()
    {
        return $this->gajitotalakhir->gaji_total;
    }

    public function scopeSumLembur($query, $bln)
    {
        return $query->lembur->where('status_keluarga_id', 3);
    }

}
