<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $table = 'kehadiran';

    protected $fillable = ['jam_masuk', 'jam_istirahat', 'jam_kembali', 'jam_pulang', 'tanggal'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
