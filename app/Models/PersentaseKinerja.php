<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersentaseKinerja extends Model
{
    protected $table = 'persentase_kinerja';

    protected $fillable = ['title', 'persen'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'karyawan_persentase_kinerja');
    }
}
