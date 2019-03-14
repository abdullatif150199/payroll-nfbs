<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluarga';

    public function karyawan()
    {
        return $this->belongsTo('App\Karyawan');
    }
}
