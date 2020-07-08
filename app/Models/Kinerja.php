<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    protected $table = 'kinerja';

    protected $fillable = ['bulan', 'title', 'value'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
