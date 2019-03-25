<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    public function karyawan()
    {
        return $this->belongsToMany('App\Karyawan', 'karyawan_unit');
    }

    public function bidang()
    {
        return $this->belongsTo('App\Bidang');
    }
}
