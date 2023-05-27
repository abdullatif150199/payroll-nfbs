<?php

// namespace App\Exports;

// use App\Models\Karyawan;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class HafalanPegawaiExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         $karyawan = Karyawan::with('hapalan')->get();

//         $hafalans = $karyawan->map(function ($karyawan) {
//             return $karyawan->hapalan;
//         });

//         return $hafalans;
//     }
// }

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class HafalanPegawaiExport implements FromQuery, WithHeadings, WithMapping
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
            $query = Karyawan::query()
            ->when($this->unit, function ($q) {
                $q->whereHas('unit', function ($q) {
                    $q->where('id', $this->unit);
                });
            })
            ->when($this->bidang, function ($q) {
                $q->whereHas('bidang', function ($q) {
                    $q->where('id', $this->bidang);
                });
            })
            ->with(['hapalan' => function ($q) {
                $q->whereBetween('tanggal', [$this->from, $this->to]);
            }])
            ->orderBy('nama_lengkap', 'asc');

        return $query;
        }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Juz',
            'Halaman Dari',
            'Halaman Sampai',
        ];
    }

    public function map($item): array
    {

        $hapalan = $item->hapalan->first(); // Mengambil entri hapalan pertama dari kumpulan hapalan

    return [
        $item->no_induk,
        $item->nama_lengkap,
        $hapalan ? $hapalan->juz : null,
        $hapalan ? $hapalan->dari_halaman : null,
        $hapalan ? $hapalan->sampai_halaman : null,
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

