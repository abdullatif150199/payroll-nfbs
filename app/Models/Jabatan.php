<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    // no_kode untuk penentuan no_induk
    protected $fillable = ['nama_jabatan', 'tunjangan_jabatan', 'load', 'maksimal_jam', 'no_kode'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'jabatan_karyawan');
    }
}
