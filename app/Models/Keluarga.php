<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Keluarga extends Model
{
    protected $table = 'keluarga';

    protected $dates = ['akhir_tunj_keluarga'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function statusKeluarga()
    {
        return $this->belongsTo(StatusKeluarga::class);
    }

    // get persentase anak
    public function getPersenAnakAttribute($value)
    {
        return $this->statusKeluarga()->where('status', 'anak')->first()->persen;
    }

    // get persentase Istri
    public function getPersenIstriAttribute($value)
    {
        return $this->statusKeluarga()->where('status', 'istri')->first()->persen;
    }

    public function scopeAnak($query)
    {
        return $query->where('status_keluarga_id', 3);
    }

    public function scopeIstri($query)
    {
        return $query->where('status_keluarga_id', 2);
    }

    public function scopeTunjAnak($query)
    {
        return $query->where('status_keluarga_id', 3)->where('akhir_tunj_keluarga', '>=', Carbon::now());
    }

    public function scopeTunjIstri($query)
    {
        return $query->where('status_keluarga_id', 2)->where('akhir_tunj_keluarga', '>=', Carbon::now());
    }
}
