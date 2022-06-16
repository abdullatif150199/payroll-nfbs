<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $guarded = [];

    public function potongan()
    {
        return $this->hasMany(Potongan::class);
    }

    public function historyPotongan()
    {
        return $this->hasMany(HistoryPotongan::class);
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class);
    }

    public function totalAmount($value)
    {
        if ($this->type == 'potongan') {
            return $this->historyPotongan()
                ->whereHas('gaji', function ($q) use ($value) {
                    $q->where('bulan', $value);
                })
                ->sum('jumlah');
        }

        return $this->gaji()
            ->has('karyawan')
            ->where('bulan', $value)
            ->sum('gaji_akhir');
    }
}
