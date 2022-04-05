<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['server_ip', 'server_port', 'serial_number', 'tipe', 'keterangan'];
}
