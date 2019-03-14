<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insentif extends Model
{
    protected $table = 'insentif';

    public function karyawan()
    {
        return $this->belongsTo('App\Karyawan');
    }
}
