<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryPotongan extends Model
{
    protected $table = 'history_potongan';

    protected $fillable = ['nama', 'jumlah'];

    public function gaji()
    {
        return $this->belongsTo(Gaji::class);
    }
}
