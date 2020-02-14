<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
