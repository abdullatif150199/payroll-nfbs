<?php

namespace App\Exports;

use App\Exports\Sheets\BankSheetExport;
use App\Exports\Sheets\TransferSheetExport;
use App\Exports\Sheets\CashSheetExport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GajiExport implements WithMultipleSheets
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
            new BankSheetExport($this->bln),
            new TransferSheetExport($this->bln),
            new CashSheetExport($this->bln)
        ];

        return $sheets;
    }
}
