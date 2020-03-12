<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluarga';

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function statusKeluarga()
    {
        return $this->belongsTo(StatusKeluarga::class);
    }
}
