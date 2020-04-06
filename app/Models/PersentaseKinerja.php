<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersentaseKinerja extends Model
{
    protected $table = 'persentase_kinerja';

    protected $fillable = ['title', 'persen'];

    protected $appends = ['to_persen'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'karyawan_persentase_kinerja');
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
