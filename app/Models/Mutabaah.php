<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutabaah extends Model
{
    use HasFactory;

    protected $fillable = ['karyawan_id', 'shubuh', 'dhuha', 'tilawah_quran', 'qiyamul_lail', 'tanggal'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
