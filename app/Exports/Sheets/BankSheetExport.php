<?php

namespace App\Exports\Sheets;

use App\Models\Gaji;
use App\Models\Rekening;
use App\Models\HistoryPotongan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class BankSheetExport implements FromView, WithTitle, WithColumnFormatting
{
    protected $bln;

    public function __construct($bln)
    {
        $this->bln = $bln;
    }

    public function view(): View
    {
        $month = $this->bln;
        $gajiByMonth = Gaji::has('karyawan')->where('bulan', $this->bln)->cursor();
        $potonganByMonth = HistoryPotongan::whereHas('gaji', function ($q) use ($month) {
            $q->where('bulan', $month);
        })->cursor();

        $sumGaji = $gajiByMonth->groupBy('rekening_id')->map(function ($row) {
            return [
                $row->rekening_id => $row->sum('gaji_akhir')
            ];
        })->toArray();

        $sumPotongan = $potonganByMonth->groupBy('rekening_id')->map(function ($row) {
            return [
                $row->rekening_id => $row->sum('jumlah')
            ];
        })->toArray();

        $sum = $sumGaji + $sumPotongan;

        dd($sumGaji);

        $rekenings = Rekening::get();
        $collections = [];
        $no = 1;

        foreach ($rekenings as $rek) {
            $collections[] = [
                'no' => $no,
                'bank' => $rek->bank,
                'no_rekening' => $rek->no_rekening,
                'atas_nama' => $rek->atas_nama,
                'keterangan' => $rek->keterangan,
                'jumlah' => isset($sum[$rek->id]) ? $sum[$rek->id] : 0
            ];

            $no++;
        }

        $rows = collect($collections);

        return view('excel.bank', [
            'rows' => $rows
        ]);
    }

    public function title(): string
    {
        return 'Bank Cover';
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1
        ];
    }
}
