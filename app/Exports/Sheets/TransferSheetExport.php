<?php

namespace App\Exports\Sheets;

use App\Models\Gaji;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TransferSheetExport implements FromView, WithTitle, WithColumnFormatting
{
    protected $bln;

    public function __construct($bln)
    {
        $this->bln = $bln;
    }

    public function view(): View
    {
        $data = $this->generator(
            Gaji::whereHas('karyawan', function ($q) {
                $q->where('pembayaran', 'transfer');
            })
                ->where('bulan', $this->bln)
                ->cursor()
        );

        $collections = [];
        $no = 1;

        foreach ($data as $val) {
            $collections[] = [
                'no' => $no,
                'nip' => $val->karyawan->no_induk,
                'no_rekening' => $val->karyawan->no_rekening,
                'nama_lengkap' => $val->karyawan->nama_lengkap,
                'bank' => $val->karyawan->nama_bank,
                'jumlah' => $val->gaji_akhir
            ];

            $no++;
        }

        $rows = collect($collections);

        return view('excel.transfer', [
            'rows' => $rows
        ]);
    }

    public function title(): string
    {
        return 'Pemb Transfer';
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1
        ];
    }

    public function generator($model)
    {
        foreach ($model as $data) {
            yield $data;
        }
    }
}
