<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    protected $fillable = ['nama_jabatan', 'tunjangan_jabatan', 'load', 'maksimal_jam', 'no_kode'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
