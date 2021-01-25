<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluarga';

    protected $fillable = [
        'karyawan_id',
        'nama',
        'status_keluarga_id',
        'tanggal_lahir',
        'tunjangan_pendidikan',
        'akhir_tunj_pendidikan',
        'akhir_tunj_keluarga'
    ];

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

    public function scopeTunjPendidikanAnak($query)
    {
        return $query->where('status_keluarga_id', 3)->where('akhir_tunj_pendidikan', '>=', date('Y-m-d'));
    }

    public function scopeTunjAnak($query)
    {
        return $query->where('status_keluarga_id', 3)->where('akhir_tunj_keluarga', '>=', date('Y-m-d'));
    }

    public function scopeTunjIstri($query)
    {
        return $query->where('status_keluarga_id', 2)->where('akhir_tunj_keluarga', '>=', date('Y-m-d'));
    }
}
