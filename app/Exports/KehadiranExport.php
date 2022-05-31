<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KehadiranExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function query()
    {
        return Karyawan::query()
            ->select('no_induk', 'nama_lengkap')
            ->whereHas('attendanceApel', function ($query) {
                $query->whereBetween('tanggal', [$this->from, $this->to]);
            });
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Hari',
            'Masuk',
            'Tanggal'
        ];
    }

    public function map($item): array
    {
        $apel = $item->attendanceApel->map(function ($apel) {
            return [
                $apel->hari,
                $apel->masuk,
                $apel->tanggal
            ];
        });

        return array_merge([
            $item->no_induk,
            $item->nama_lengkap
        ], $apel);
    }
}
