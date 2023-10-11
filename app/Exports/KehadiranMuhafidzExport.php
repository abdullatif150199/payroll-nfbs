<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\KehadiranMuhafidz;

class KehadiranMuhafidzExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $from;
    protected $to;
    // protected $bidang;
    // protected $unit;
    protected $range;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
        // $this->bidang = $bidang;
        // $this->unit = $unit;
        $this->range = ((strtotime($to) - strtotime($from))/3600/24) + 1;
    }

    public function query()
    {
        // if ($this->unit && $this->unit != '')
        // {
        //     return Karyawan::query()
        //             ->with(['jamperpekan', 'kehadiran' => function ($q){
        //                 $q->whereBetween('tanggal', [$this->from, $this->to]);
        //             }])
        //             ->when($this->unit, function ($q){
        //                 $q->whereHas('unit', function ($q){
        //                     $q->where('id', $this->unit);
        //                 });
        //             })->orderBy('nama_lengkap', 'asc');
        // }

        // if ($this->bidang && $this->bidang != '')
        // {
        //     return Karyawan::query()
        //         ->with(['jamperpekan', 'kehadiran' => function ($query){
        //             $query->whereBetween('tanggal',[$this->from, $this->to]);
        //         }])
        //         ->when($this->bidang, function ($q){
        //             $q->whereHas('bidang', function ($q){
        //                 $q->where('id', $this->bidang);
        //             });
        //         })->orderBy('nama_lengkap', 'asc');
        // }

        $karyawan = Karyawan::whereHas('bidang', function ($q) {
            $q->where('nama_bidang', 'Muhafidz');
        })->with([
            'kehadiranMuhafidz' => function ($q) {
                $q->whereBetween('tanggal', [$this->from, $this->to]);
            },
        ])
        ->orderBy('nama_lengkap', 'asc')
        ->get();

        return $karyawan;
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Jumlah Jam',
            'Persentasi',
        ];
    }

    public function map($item): array
    {
        return [
            $item->no_induk,
            $item->nama_lengkap,
            total_sum_time($item->kehadiran,$item->tipe_kerja),

        ];
    }

}
