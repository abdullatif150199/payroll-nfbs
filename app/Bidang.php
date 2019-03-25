<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';

    public function karyawan()
    {
        return $this->belongsToMany('App\Karyawan', 'bidang_karyawan');
    }

    public function unit()
    {
        return $this->hasMany('App\Unit');
    }
}
