<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelompokKerja extends Model
{
    protected $table = 'kelompok_kerja';

    protected $fillable = [
        'grade', 'persen',
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
