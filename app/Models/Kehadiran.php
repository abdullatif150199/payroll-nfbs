<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $table = 'kehadiran';

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
