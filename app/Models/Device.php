<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['serial_number', 'tipe', 'keterangan'];

    public function deviceLogs()
    {
        return $this->hasMany(DeviceLog::class);
    }
}
