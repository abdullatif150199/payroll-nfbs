<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';

    protected $fillable = ['kode_golongan', 'gaji_pokok', 'lembur'];

    public function karyawan()
    {
        return $this->hasMany('App\Karyawan');
    }
}
