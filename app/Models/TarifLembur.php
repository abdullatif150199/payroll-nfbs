<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TarifLembur extends Model
{
    protected $table = 'tarif_lembur';

    protected $fillable = ['golongan', 'kelompok', 'tarif'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
