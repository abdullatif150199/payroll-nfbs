<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiKinerja extends Model
{
    protected $table = 'nilai_kinerja';

    protected $fillable = ['nilai', 'min_nilai', 'result_persen'];

    protected $appends = ['to_result_persen'];

    public function getToResultPersenAttribute()
    {
        return ($this->result_persen * 100);
    }

    public function setResultPersenAttribute($value)
    {
        $this->attributes['result_persen'] = round($value/100, 2);
    }
}
