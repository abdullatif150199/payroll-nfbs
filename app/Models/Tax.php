<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'kode',
        'ptkp_pertahun',
        'ptkp_perbulan',
        'persentase_pph21',
        'persentase_biaya_jabatan'
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function setPtkpPertahunAttribute($value)
    {
        $this->attributes['ptkp_pertahun'] = preg_replace('/\D/', '', $value);
    }

    public function setPtkpPerbulanAttribute($value)
    {
        $this->attributes['ptkp_perbulan'] = preg_replace('/\D/', '', $value);
    }

    public function setPersentasePph21Attribute($value)
    {
        $this->attributes['persentase_pph21'] = round($value/100, 2);
    }

    public function setPersentaseBiayaJabatanAttribute($value)
    {
        $this->attributes['persentase_biaya_jabatan'] = round($value/100, 2);
    }
}
