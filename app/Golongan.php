<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';

    public function karyawan()
    {
        return $this->hasMany('App\Karyawan');
    }
}
