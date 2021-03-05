<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApelDay extends Model
{
    protected $fillable = [
        'day_name',
        'start_time_at',
        'end_time_at'
    ];
}
