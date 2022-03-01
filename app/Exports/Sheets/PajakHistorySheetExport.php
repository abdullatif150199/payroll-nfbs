<?php

namespace App\Exports\Sheets;

use App\Models\Gaji;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class PajakHistorySheetExport implements
    FromQuery,
    WithMapping,
    WithHeadings,
    WithTitle,
    WithEvents
{
    use Exportable;

    protected $bln;

    public function __construct($bln)
    {
        $this->bln = $bln;
    }

    public function query()
    {
        return Gaji::with('karyawan', 'taxHistory')
            ->where('bulan', $this->bln);
    }

    public function map($gaji): array
    {
        $jabatan = implode(',', $gaji->karyawan->jabatan()->pluck('nama_jabatan')->toArray());
        return [
            $gaji->karyawan->nama_lengkap,
            $jabatan,
            $gaji->karyawan->tax->kode,
            $gaji->karyawan->no_npwp,
            $gaji->taxHistory->gaji_perbulan,
            $gaji->taxHistory->gaji_pertahun,
            $gaji->taxHistory->thr,
            $gaji->taxHistory->penghasilan_bruto,
            $gaji->taxHistory->biaya_jabatan,
            $gaji->taxHistory->penghasilan_neto,
            $gaji->taxHistory->ptkp_pertahun,
            $gaji->taxHistory->pkp_pertahun,
            $gaji->taxHistory->pph21_pertahun,
            $gaji->taxHistory->pph21_perbulan,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Jabatan',
            'Status',
            'No. NPWP',
            'Gaji',
            'Gaji Disetahunkan',
            'THR',
            'Penghasilan Bruto',
            'Biaya Jabatan',
            'Penghasilan Neto',
            'PTKP',
            'PKP',
            'PPH Pasal 21',
            'PPH Pasal 21 Sebulan'
        ];
    }

    public function title(): string
    {
        return 'Pajak';
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
