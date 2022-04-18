<?php

namespace App\Exports;

use App\Models\DeviceLog;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ScanlogExport implements FromQuery, WithHeadings, WithMapping
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
        return DeviceLog::query()
            ->whereBetween('scan_at', [$this->from, $this->to]);
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Jam Scan',
            'Tgl Scan',
            'Tempat'
        ];
    }

    public function map($scan): array
    {
        return [
            $scan->nama_lengkap,
            date('H:i', strtotime($scan->scan_at)),
            date('d-m-Y', strtotime($scan->scan_at)),
            $scan->device->keterangan ?? null
        ];
    }
}
