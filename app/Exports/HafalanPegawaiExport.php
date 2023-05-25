<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;

class HafalanPegawaiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $karyawan = Karyawan::with('hapalan')->get();

        $hafalans = $karyawan->map(function ($karyawan) {
            return $karyawan->hapalan;
        });

        return $hafalans;
    }
}
