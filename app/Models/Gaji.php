<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gaji';

    protected $fillable = [
        'bulan',
        'gaji_pokok',
        'tunjangan_jabatan',
        'tunjangan_fungsional',
        'tunjangan_kinerja',
        'tunjangan_pendidikan',
        'tunjangan_istri',
        'tunjangan_anak',
        'tunjangan_hari_raya',
        'lembur',
        'lain_lain',
        'insentif',
        'potongan',
        'gaji_total'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function historyPotongan()
    {
        return $this->hasMany(HistoryPotongan::class);
    }

    public function deleteHistoryPotongan()
    {
        // delete all related potongan
        return $this->historyPotongan()->delete();
    }

    public function historyKinerja()
    {
        return $this->hasMany(HistoryKinerja::class);
    }

    public function scopeBulan($query, $bln)
    {
        return $query->where('bulan', $bln);
    }

    public function scopeGetKinerja($query, $data)
    {
        $val = $this->historyKinerja()->sumPersentaseKinerja();
        $result = [];

        foreach ($data as $item) {
            if ($val >= $item->min_nilai) {
                $result = $item;
                break;
            }
        }

        return $result;
    }

    public function scopeNilaiKinerja($query, $data)
    {
        $val = $this->historyKinerja()->sumPersentaseKinerja();
        $result = '-';

        foreach ($data as $item) {
            if ($val >= $item->min_nilai) {
                $result = $item->nilai;
                break;
            }
        }

        return $result;
    }

    public function scopeResultKinerja($query, $data)
    {
        $val = $this->historyKinerja()->sumPersentaseKinerja();
        $result = '';

        foreach ($data as $item) {
            if ($val >= $item->min_nilai) {
                $result = $item->result_persen * $this->karyawan->kelompokKerja->kinerja_normal;
                break;
            }
        }

        return $result;
    }

    public function deleteHistoryKinerja()
    {
        // delete all related potongan
        return $this->historyKinerja()->delete();
    }
}
