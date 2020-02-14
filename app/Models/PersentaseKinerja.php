<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersentaseKinerja extends Model
{
    protected $table = 'persentase_kinerja';

    public function karyawans()
    {
        return $this->belongsToMany(Karyawan::class, 'karyawan_persentase_kinerja');
    }
}
