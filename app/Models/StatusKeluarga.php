<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKeluarga extends Model
{
    protected $table = 'status_keluarga';

    protected $fillable = ['status', 'persen'];

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class);
    }
}
