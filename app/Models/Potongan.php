<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    protected $table = 'potongan';

    protected $fillable = ['nama_potongan', 'jumlah_potongan', 'type'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'karyawan_potongan')->withPivot('end_at');
    }
}
