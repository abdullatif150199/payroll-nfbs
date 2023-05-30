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
                if ($juz == 1) {
                    $startHalaman = 1;
                    $endHalaman = 21;
                } elseif ($juz >= 2 && $juz <= 29) {
                    $startHalaman = (($juz - 2) * 20) + 22;
                    $endHalaman = (($juz - 1) * 20) + 21;
                } elseif ($juz == 30) {
                    $startHalaman = 581;
                    $endHalaman = 605;
                } else {
                    $startHalaman = 0;
                    $endHalaman = 0;
                }

                if ($juz === 0) {
                    $halamanDiHapal = 0;
                } elseif ($juz == 30) {
                    $halamanDiHapal = $halamanTerakhir - $startHalaman;
                } else  {
                    $halamanDiHapal = $halamanTerakhir - $startHalaman + 1;
                }

                $sisaHalaman = $endHalaman - $halamanTerakhir;
    
                $data[] = [
                    $item->no_induk,
                    $item->nama_lengkap,
                    $juzHafalan. " juz ". $halamanDiHapal ." Halaman ",
                    "juz ".$juz." Halaman " . $halamanTerakhir,
                ];
            } else {
                $data[] = [
                    $item->no_induk,
                    $item->nama_lengkap,
                    " - ",
                    " - ",
                ];
            }
        }

        return new Collection($data);
    }
    
}

