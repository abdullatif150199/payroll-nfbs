<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JamAjar extends Model
{
    protected $table = 'jam_ajar';

    protected $fillable = ['jml', 'ket'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
