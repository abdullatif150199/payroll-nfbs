<?php

namespace App\Exports\Sheets;

use App\Models\Gaji;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CashSheetExport implements FromView, WithTitle, WithColumnFormatting
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
                $q->where('pembayaran', 'cash');
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
                'nama_lengkap' => $val->karyawan->nama_lengkap,
                'jumlah' => $val->gaji_akhir,
                'gaji_pokok' => $val->gaji_pokok,
                'tunj_jabatan' => $val->tunjangan_jabatan,
                'tunj_fungsional' => $val->tunjangan_fungsional,
                'tunj_struktural' => $val->tunjangan_struktural,
                'tunj_kinerja' => $val->tunjangan_kinerja,
                'tunj_pendidikan' => $val->tunjangan_pendidikan,
                'tunj_istri' => $val->tunjangan_istri,
                'tunj_anak' => $val->tunjangan_anak,
                'lembur' => $val->lembur,
                'insetif' => $val->insentif,
                'lainnya' => $val->lain_lain,
                'potongan' => $val->potongan
            ];

            $no++;
        }

        $rows = collect($collections);

        return view('excel.cash', [
            'rows' => $rows
        ]);
    }

    public function title(): string
    {
        return 'Pemb Cash';
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1
        ];
    }

    public function generator($model)
    {
        foreach ($model as $data) {
            yield $data;
        }
    }
}
