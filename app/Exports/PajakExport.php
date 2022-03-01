<?php

namespace App\Exports;

use App\Exports\Sheets\PajakHistorySheetExport;
use App\Exports\Sheets\PajakSheetExport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PajakExport implements WithMultipleSheets
{
    use Exportable;

    protected $bln;

    public function __construct($bln)
    {
        $this->bln = $bln;
    }

    public function sheets(): array
    {
        $sheets = [
            new PajakHistorySheetExport($this->bln),
            new PajakSheetExport
        ];

        return $sheets;
    }
}
