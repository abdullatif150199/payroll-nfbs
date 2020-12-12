<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';

    protected $fillable = ['nama_bidang'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'bidang_karyawan');
    }

    public function unit()
    {
        return $this->hasMany(Unit::class);
    }
}
