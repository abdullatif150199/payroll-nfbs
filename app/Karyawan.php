<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan');
    }

    public function golongan()
    {
        return $this->belongsTo('App\Golongan');
    }

    public function bidang()
    {
        return $this->belongsTo('App\Bidang');
    }

    public function kehadiran()
    {
        return $this->hasMany('App\Kehadiran');
    }

    public function cuti()
    {
        return $this->hasMany('App\Cuti');
    }
}
