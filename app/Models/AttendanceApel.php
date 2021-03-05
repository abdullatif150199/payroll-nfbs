<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceApel extends Model
{
    protected $fillable = ['hari', 'masuk', 'tanggal'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
