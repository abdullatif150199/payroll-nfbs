<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKerja extends Model
{
    protected $table = 'status_kerja';

    protected $fillable = ['nama_status_kerja', 'persentase_gaji_pokok'];

    protected $appends = ['to_persen'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function getToPersenAttribute()
    {
        return ($this->persentase_gaji_pokok * 100);
    }

    public function setPersentaseGajiPokokAttribute($value)
    {
        $this->attributes['persentase_gaji_pokok'] = round($value/100, 2);
    }
}
