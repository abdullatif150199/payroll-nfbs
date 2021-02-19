<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = ['nama_jabatan', 'tunjangan_jabatan', 'load', 'jml_jam_ajar'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'jabatan_karyawan');
    }
}
