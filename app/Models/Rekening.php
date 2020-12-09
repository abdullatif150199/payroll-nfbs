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
}
