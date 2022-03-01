<?php

namespace App\Exports\Sheets;

use App\Models\Tax;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class PajakSheetExport implements
    FromQuery,
    WithMapping,
    WithHeadings,
    WithTitle,
    WithEvents
{
    use Exportable;

    public function query()
    {
        return Tax::query();
    }

    public function map($tax): array
    {
        return [
            $tax->id,
            $tax->kode,
            $tax->ptkp_pertahun,
            $tax->ptkp_perbulan,
            $tax->persentase_pph21
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Status/Kode',
            'PTKP Pertahun',
            'PTKP Perbulan',
            'Persentase PPH 21'
        ];
    }

    public function title(): string
    {
        return 'Info Pajak';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:Z1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
