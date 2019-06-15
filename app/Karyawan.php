<?php

namespace App;

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
        return $this->belongsTo('App\Jabatan');
    }

    public function golongan()
    {
        return $this->belongsTo('App\Golongan');
    }

    public function bidang()
    {
        return $this->belongsToMany('App\Bidang', 'bidang_karyawan');
    }

    public function unit()
    {
        return $this->belongsToMany('App\Unit', 'karyawan_unit');
    }

    public function kehadiran()
    {
        return $this->hasMany('App\Kehadiran');
    }

    public function cuti()
    {
        return $this->hasMany('App\Cuti');
    }

    public function potongan()
    {
        return $this->belongsToMany('App\Potongan', 'karyawan_potongan');
    }

    public function lembur()
    {
        return $this->hasMany('App\Lembur');
    }

    public function keluarga()
    {
        return $this->hasMany('App\Keluarga');
    }

    public function insentif()
    {
        return $this->hasMany('App\Insentif');
    }

    public function gaji()
    {
        return $this->hasMany('App\Gaji');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function statusKerja()
    {
        return $this->belongsTo('App\StatusKerja');
    }
}
