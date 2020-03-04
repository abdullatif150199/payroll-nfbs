<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'user_id', 'golongan_id', 'jabatan_id', 'status_kerja_id', 'bidang_id', 'unit_id', 'no_induk', 'nik', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'status_pernikahan', 'alamat', 'no_hp', 'nama_pendidikan', 'pendidikan_terakhir', 'jurusan', 'tahun_lulus',
        'tanggal_masuk', 'tanggal_keluar', 'nama_bank', 'no_rekening', 'rekening_atas_nama', 'status'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusKerja()
    {
        return $this->belongsTo(StatusKerja::class);
    }

    public function persentaseKinerja()
    {
        return $this->belongsToMany(PersentaseKinerja::class, 'karyawan_persentase_kinerja');
    }

    public function jamPerpekan()
    {
        return $this->belongsTo(JamPerpekan::class);
    }
}
