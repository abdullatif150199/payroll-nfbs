<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';

    protected $fillable = ['karyawan_id', 'start_at', 'end_at', 'ket'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
