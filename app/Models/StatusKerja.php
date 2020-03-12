<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKerja extends Model
{
    protected $table = 'status_kerja';

    protected $fillable = ['nama_status_kerja', 'persentase_gaji_pokok'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
