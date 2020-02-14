<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKerja extends Model
{
    protected $table = 'status_kerja';

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
