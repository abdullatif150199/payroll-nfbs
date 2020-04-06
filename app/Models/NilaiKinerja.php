<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiKinerja extends Model
{
    protected $table = 'nilai_kinerja';

    protected $fillable = ['nilai', 'min_persen', 'max_persen', 'result_persen'];

    protected $appends = ['to_min_persen', 'to_max_persen', 'to_result_persen'];

    public function getToMinPersenAttribute()
    {
        return ($this->min_persen * 100);
    }

    public function getToMaxPersenAttribute()
    {
        return ($this->max_persen * 100);
    }

    public function getToResultPersenAttribute()
    {
        return ($this->result_persen * 100);
    }

    public function setMinPersenAttribute($value)
    {
        $this->attributes['min_persen'] = round($value/100, 2);
    }

    public function setMaxPersenAttribute($value)
    {
        $this->attributes['max_persen'] = round($value/100, 2);
    }

    public function setResultPersenAttribute($value)
    {
        $this->attributes['result_persen'] = round($value/100, 2);
    }
}
