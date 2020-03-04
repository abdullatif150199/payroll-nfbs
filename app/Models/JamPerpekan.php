<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JamPerpekan extends Model
{
    protected $table = 'jam_perpekan';

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
