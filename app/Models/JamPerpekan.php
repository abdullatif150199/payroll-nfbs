<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JamPerpekan extends Model
{
    protected $table = 'jam_perpekan';
    protected $fillable = ['keterangan', 'jml_jam', 'jml_jam_ngajar', 'jml_hari'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
