<?php



namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithHeadings;


use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;


class  HafalanPegawaiExport implements FromCollection, WithHeadings
{

    protected $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

        public function headings(): array
    {
        return [
            'NIP',
            'Nama Lengkap',
            'Total Hafalan',
            'Hafalan Terakhir'
        ];
    }

    public function collection()
    {
        $data = [];

        foreach ($this->items as $item) {
            $hapalans = $item->hapalan()->get();
            $juzHafalan = $hapalans->unique('juz')->count() - 1;
            $hafalanTerakhir = $hapalans->sortByDesc('juz')->first();
    
            if ($hafalanTerakhir) {
                $juz = $hafalanTerakhir->juz;
                $halamanTerakhir = $hafalanTerakhir->sampai_halaman;
    
                $data[] = [
                    $item->no_induk,
                    $item->nama_lengkap,
                    $juzHafalan. " juz ".$halamanTerakhir." Halaman ",
                    "juz ".$juz." Halaman ".$halamanTerakhir,
                ];
            } else {
                $data[] = [
                    $item->no_induk,
                    $item->nama_lengkap,
                    " Belum Ada Hafalan ",
                    " - ",
                ];
            }
        }

        return new Collection($data);
    }
    
}

