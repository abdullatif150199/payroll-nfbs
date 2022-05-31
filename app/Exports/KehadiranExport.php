<?php

namespace App\Exports;

use App\Models\AttendanceApel;
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
        $data = AttendanceApel::query()
            ->with('karyawan')
            ->whereBetween('tanggal', [$this->from, $this->to]);
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
        return [
            $item->attandanceapel->no_induk,
            $item->attandanceapel->nama_lengkap,
            to_hari($item->hari),
            $item->masuk,
            $item->tanggal
        ];
    }
}
