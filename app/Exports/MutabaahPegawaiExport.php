<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class MutabaahPegawaiExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell, WithEvents
{
    use Exportable;

    protected $from;
    protected $to;
    protected $bidang;
    protected $unit;
    protected $range;

    public function __construct($from, $to, $bidang = null, $unit = null)
    {
        $this->from = $from;
        $this->to = $to;
        $this->bidang = $bidang;
        $this->unit = $unit;
        $this->range = ((strtotime($to) - strtotime($from)) / 3600 / 24) + 1;
    }

    public function query()
    {
        if ($this->unit && $this->unit != '') {
            return Karyawan::query()
                ->withCount(['mutabaah' => function ($q) {
                    $q->whereBetween('tanggal', [$this->from, $this->to]);
                }])
                ->when($this->unit, function ($q) {
                    $q->whereHas('unit', function ($q) {
                        $q->where('id', $this->unit);
                    });
                })->orderBy('nama_lengkap', 'asc');
        }

        if ($this->bidang && $this->bidang != '') {
            return Karyawan::query()
                ->withCount(['mutabaah' => function ($query) {
                    $query->whereBetween('tanggal', [$this->from, $this->to]);
                }])
                ->when($this->bidang, function ($q) {
                    $q->whereHas('bidang', function ($q) {
                        $q->where('id', $this->bidang);
                    });
                })->orderBy('nama_lengkap', 'asc');
        }

        return Karyawan::query()
            ->withCount([
                'mutabaah' => function ($q) {
                    $q->whereBetween('tanggal', [$this->from, $this->to]);
                },
                'mutabaah as ya_shubuh' => function ($q) {
                    $q->where('shubuh', 'ya');
                },
                'mutabaah as tidak_shubuh' => function ($q) {
                    $q->where('shubuh', 'tidak');
                },
                'mutabaah as ya_dhuha' => function ($q) {
                    $q->where('dhuha', 'ya');
                },
                'mutabaah as haid_dhuha' => function ($q) {
                    $q->where('dhuha', 'haid');
                },
                'mutabaah as tidak_dhuha' => function ($q) {
                    $q->where('dhuha', 'tidak');
                },
                'mutabaah as ya_tilawah' => function ($q) {
                    $q->where('tilawah_quran', 'ya');
                },
                'mutabaah as haid_tilawah' => function ($q) {
                    $q->where('tilawah_quran', 'haid');
                },
                'mutabaah as tidak_tilawah' => function ($q) {
                    $q->where('tilawah_quran', 'tidak');
                },
                'mutabaah as ya_qiyamul_lail' => function ($q) {
                    $q->where('qiyamul_lail', 'ya');
                },
                'mutabaah as haid_qiyamul_lail' => function ($q) {
                    $q->where('qiyamul_lail', 'haid');
                },
                'mutabaah as tidak_qiyamul_lail' => function ($q) {
                    $q->where('qiyamul_lail', 'tidak');
                },
            ])
            ->orderBy('nama_lengkap', 'asc');
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function (AfterSheet $event) {
                /** @var Sheet $sheet */
                $sheet = $event->sheet;

                $sheet->mergeCells('A1:A2');
                $sheet->setCellValue('A1', "NIP");

                $sheet->mergeCells('B1:B2');
                $sheet->setCellValue('B1', "Nama");

                $sheet->mergeCells('C1:C2');
                $sheet->setCellValue('C1', "Mengisi Mutabaah");

                $sheet->mergeCells('D1:D2');
                $sheet->setCellValue('D1', "Persentase Mengisi Mutabaah");

                $sheet->mergeCells('E1:F1');
                $sheet->setCellValue('E1', "Jamaah Shubuh");

                $sheet->mergeCells('G1:I1');
                $sheet->setCellValue('G1', "Dhuha");

                $sheet->mergeCells('J1:L1');
                $sheet->setCellValue('J1', "Tilawah");

                $sheet->mergeCells('M1:O1');
                $sheet->setCellValue('M1', "Qiyamul Lail");

                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];

                $cellRange = 'A1:O260'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
            },
        ];
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Jml Isi Mutabaah',
            'Persentase Isi Mutabaah',
            'ya',
            'tidak',
            'ya',
            'haid',
            'tidak',
            'ya',
            'haid',
            'tidak',
            'ya',
            'haid',
            'tidak',
        ];
    }

    public function map($item): array
    {
        return [
            $item->no_induk,
            $item->nama_lengkap,
            $item->mutabaah_count,
            $this->percentage($item->mutabaah_count, $this->range, $this->from, $this->to),
            $this->percentage($item->ya_shubuh, $this->range, $this->from, $this->to),
            $this->percentage($item->tidak_shubuh, $this->range, $this->from, $this->to),
            $this->percentage($item->ya_dhuha, $this->range, $this->from, $this->to),
            $this->percentage($item->haid_dhuha, $this->range, $this->from, $this->to),
            $this->percentage($item->tidak_dhuha, $this->range, $this->from, $this->to),
            $this->percentage($item->ya_tilawah, $this->range, $this->from, $this->to),
            $this->percentage($item->haid_tilawah, $this->range, $this->from, $this->to),
            $this->percentage($item->tidak_tilawah, $this->range, $this->from, $this->to),
            $this->percentage($item->ya_qiyamul_lail, $this->range, $this->from, $this->to),
            $this->percentage($item->haid_qiyamul_lail, $this->range, $this->from, $this->to),
            $this->percentage($item->tidak_qiyamul_lail, $this->range, $this->from, $this->to),
        ];
    }

    // persentasi mode tanpa hari ahad
    public function percentage($data, $range, $start, $end)
    {
        $jml_hari = $range - how_many_sundays($start, $end);

        if ($data <= 0) return 0;

        $persen = ($data / $jml_hari) * 100;
        return round($persen, 2);
    }
}
