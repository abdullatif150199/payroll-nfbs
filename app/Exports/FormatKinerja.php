<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PersentaseKinerja;

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

        return [
            array_merge($head, $kinerja),
            ['123456', 'Fulan', 'Personalia', '100', '80']
        ];
    }
}
