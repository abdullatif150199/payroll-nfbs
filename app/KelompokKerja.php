<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokKerja extends Model
{
    protected $table = 'kelompok_kerja';

    protected $fillable = [
        'grade', 'persen',
    ];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
