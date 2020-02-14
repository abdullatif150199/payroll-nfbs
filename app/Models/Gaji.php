<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gaji';

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
