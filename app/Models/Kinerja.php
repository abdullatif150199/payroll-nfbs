<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    protected $table = 'kinerja';

    protected $fillable = ['bulan', 'produktifitas', 'kehadiran', 'kepesantrenan', 'pembinaan'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
