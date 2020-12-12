<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryKinerja extends Model
{
    protected $table = 'history_kinerja';

    protected $fillable = ['title', 'value', 'after_count', 'unit'];

    public function gaji()
    {
        return $this->belongsTo(Gaji::class);
    }

    public function scopeBulan($query, $bln)
    {
        return $query->where('bulan', $bln);
    }

    public function scopeSumPersentaseKinerja($query)
    {
        $count = $query->get()->groupBy('unit')->count();
        if ($count > 1) {
            return $query->sum('after_count') / $count;
        }

        return $query->sum('after_count');
    }
}
