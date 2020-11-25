<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    protected $table = 'lembur';
    protected $fillable = ['bulan', 'jumlah_jam', 'keterangan', 'date', 'type', 'total_tarif'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function scopeBulan($query, $bln)
    {
        return $query->where('bulan', $bln);
    }

    public function scopeSumLembur($query, $bln)
    {
        return $query->bulan($bln)->sum('total_tarif');
    }
}
