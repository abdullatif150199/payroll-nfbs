<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gaji';

    protected $fillable = [
        'bulan',
        'gaji_pokok',
        'tunjangan_jabatan',
        'tunjangan_fungsional',
        'tunjangan_kinerja',
        'tunjangan_pendidikan',
        'tunjangan_istri',
        'tunjangan_anak',
        'tunjangan_hari_raya',
        'lembur',
        'lain_lain',
        'insentif',
        'potongan',
        'gaji_total'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
