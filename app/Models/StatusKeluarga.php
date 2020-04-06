<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKeluarga extends Model
{
    protected $table = 'status_keluarga';

    protected $fillable = ['status', 'persen'];

    protected $appends = ['to_persen'];

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class);
    }

    public function getToPersenAttribute()
    {
        return ($this->persen * 100);
    }

    public function setPersenAttribute($value)
    {
        $this->attributes['persen'] = round($value/100, 2);
    }
}
