<?php

namespace App\Exports;

use App\Models\Karyawan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KehadiranExport implements FromView
{
    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function view(): View
    {
        $data = Karyawan::query()
            ->select('no_induk', 'nama_lengkap')
            ->whereHas('attendanceApel', function ($query) {
                $query->whereBetween('tanggal', [$this->from, $this->to]);
            })
            ->get();

        return view('exports.apel', ['data' => $data]);
    }
}
