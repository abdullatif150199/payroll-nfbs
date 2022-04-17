<?php

namespace App\Exports;

use App\Models\DeviceLog;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class ScanlogExport implements FromQuery
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
}
