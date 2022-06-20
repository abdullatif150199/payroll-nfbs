<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PersentaseKinerja;
use App\Models\Karyawan;

class FormatKinerja implements WithHeadings
{
    public function headings(): array
    {
        $head = [
            'No Induk',
            'Nama lengkap',
            'Unit',
        ];
        $kinerja = PersentaseKinerja::pluck('title')->toArray();
        $data = [
            array_merge($head, $kinerja),
            ['123456', 'Fulan', 'Personalia', '100', '80']
        ];
        if (auth()->user()->hasRole(['root', 'admin'])) {
            $data = [
                array_merge($head, $kinerja)
            ];
            $karyawan = Karyawan::with(['unit'])->cursor();
            foreach ($karyawan as $kar) {
                $data[] = [
                    $kar->no_induk,
                    $kar->nama_lengkap,
                    implode(',', $kar->unit->pluck('nama_unit')->toArray()),
                    '',
                    ''
                ];
            }
        }
        
        return $data;
    }
}
