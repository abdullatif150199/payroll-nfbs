<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusKerja extends Model
{
    protected $table = 'status_kerja';

    public function karyawan()
    {
        return $this->hasMany('App\Karyawan');
    }
}
