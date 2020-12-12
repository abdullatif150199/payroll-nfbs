<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';

    protected $fillable = ['kode_golongan', 'gaji_pokok', 'lembur', 'lembur_harian'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
