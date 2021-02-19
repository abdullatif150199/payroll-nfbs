<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelompokKerja extends Model
{
    protected $table = 'kelompok_kerja';

    protected $fillable = [
        'grade', 'persen', 'kinerja_normal', 'no_kode'
    ];

    protected $appends = ['to_persen'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function getToPersenAttribute()
    {
        return ($this->persen * 100);
    }

    public function setPersenAttribute($value)
    {
        $this->attributes['persen'] = round($value/100, 2);
    }
}
