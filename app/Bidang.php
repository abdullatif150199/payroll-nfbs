<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';

    public function karyawan()
    {
        return $this->hasMany('App\Karyawan');
    }
}
