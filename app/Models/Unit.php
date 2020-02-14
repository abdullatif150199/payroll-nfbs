<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'karyawan_unit');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
