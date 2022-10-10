<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KehadiranPegawaiExport implements FromQuery, WithHeadings, WithMapping
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
        $this->range = ((strtotime($to) - strtotime($from))/3600/24) + 1;
    }

    public function query()
    {
        if ($this->unit && $this->unit != '')
        {
            return Karyawan::query()
                    ->with(['jamperpekan', 'kehadiran' => function ($q){
                        $q->whereBetween('tanggal', [$this->from, $this->to]);
                    }])
                    ->when($this->unit, function ($q){
                        $q->whereHas('unit', function ($q){
                            $q->where('id', $this->unit);
                        });
                    })->orderBy('nama_lengkap', 'asc');
        }

        if ($this->bidang && $this->bidang != '')
        {
            return Karyawan::query()
                ->with(['jamperpekan', 'kehadiran' => function ($query){
                    $query->whereBetween('tanggal',[$this->from, $this->to]);
                }])
                ->when($this->bidang, function ($q){
                    $q->whereHas('bidang', function ($q){
                        $q->where('id', $this->bidang);
                    });
                })->orderBy('nama_lengkap', 'asc');
        }

        return Karyawan::query()
                ->with(['jamperpekan','kehadiran'=>function($q){
                    $q->whereBetween('tanggal',[$this->from, $this->to]);
                }])
                ->orderBy('nama_lengkap', 'asc');
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
            $this->persentaseKehadiran($item, $this->range)
        ];
    }

    public function persentaseKehadiran($data, $range)
    {
        $jam_perhari = round($data->jamperpekan->jml_jam/$data->jamperpekan->jml_hari, 2);
        $jam_hadir = total_sum_time($data->kehadiran, $data->tipe_kerja, 'val');
        $jam_wajib = ($range * $jam_perhari) * 3600;

        if ($jam_wajib <= 0) {
            return 0;
        }

        $persen = ($jam_hadir/$jam_wajib) * 100;

        if ($persen > 100) {
            return 100;
        }

        return round($persen, 2);
    }
}
