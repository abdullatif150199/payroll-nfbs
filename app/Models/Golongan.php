<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';

    protected $fillable = ['kode_golongan', 'gaji_pokok', 'lembur'];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
