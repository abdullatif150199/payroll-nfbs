<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    protected $table = 'potongan';

    protected $fillable = ['rekening_id', 'nama_potongan', 'jumlah_potongan', 'type'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'karyawan_potongan')->withPivot(['end_at', 'qty']);
    }

    public function rekening()
    {
        return $this->belongsTo(Rekening::class);
    }
}
