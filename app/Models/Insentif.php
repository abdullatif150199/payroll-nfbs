<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insentif extends Model
{
    protected $table = 'insentif';

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
