<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $table = 'kehadiran';

    protected $fillable = ['jam_masuk', 'jam_istirahat', 'jam_kembali', 'jam_pulang', 'tanggal', 'tipe'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function scopeFilterByUnitOrBidang($query, $request)
    {
        $tanggal = $request->tanggal ? $request->tanggal : date('Y-m-d');

        $query->with('karyawan')
            ->when($request->bidang, function ($query) use ($request) {
                $query->whereHas('karyawan.bidang', function ($q) use ($request) {
                    $q->where('id', $request->bidang);
                });
            })
            ->when($request->unit, function ($query) use ($request) {
                $query->whereHas('karyawan.unit', function ($q) use ($request) {
                    $q->where('id', $request->unit);
                });
            })
            ->where('tanggal', $tanggal)
            ->latest();
    }
}
