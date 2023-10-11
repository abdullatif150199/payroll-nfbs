<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranMuhafidz extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function karyawan ()
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
