<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxHistory extends Model
{
    protected $fillable = [
        'gaji_perbulan',
        'gaji_pertahun',
        'thr',
        'penghasilan_bruto',
        'biaya_jabatan',
        'penghasilan_neto',
        'ptkp_pertahun',
        'ptkp_perbulan',
        'pph21_pertahun',
        'pph21_perbulan'
    ];

    public function gaji()
    {
        return $this->belongsTo(Gaji::class);
    }
}
