<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $table = 'kehadiran';

    public function karyawan()
    {
        return $this->belongsTo('App\Karyawan');
    }
}
