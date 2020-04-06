<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insentif extends Model
{
    protected $table = 'insentif';

    protected $fillable = ['karyawan_id', 'jenis_insentif', 'bulan', 'jumlah', 'keterangan'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function scopeBulan($query, $bln)
    {
        return $query->where('bulan', $bln);
    }
}
