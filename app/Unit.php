<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    public function karyawan()
    {
        return $this->hasMany('App\Karyawan');
    }
}
