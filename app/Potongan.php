<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    protected $table = 'potongan';

    protected $fillable = ['nama_potongan', 'jumlah_potongan', 'type'];

    public function karyawan()
    {
        return $this->belongsToMany('App\Karyawan', 'karyawan_potongan');
    }
}
