<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    protected $table = 'lembur';

    public function karyawan()
    {
        return $this->belongsTo('App\Karyawan');
    }
}
