<?php

namespace App\Imports;

use App\Models\Karyawan;
use App\Models\PersentaseKinerja;
use App\Models\Unit;
use App\Jobs\ProcessPayroll;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\DB;

class ImportKinerja implements
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
    WithBatchInserts,
    WithChunkReading
{
    use Importable, SkipsErrors, SkipsFailures;

    protected $bln;

    public function __construct($bln)
    {
        $this->bln = $bln;
    }

    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        $bln = $this->bln;
        DB::transaction(function () use ($row, $bln) {
            $noInduk = str_replace('.', '', $row['no_induk']);
            $karyawan = Karyawan::with(['persentaseKinerja', 'gaji'])
                ->where('no_induk', $noInduk)
                ->first();

            $gaji = $karyawan->gaji()->updateOrCreate([
                'bulan' => $bln
            ], [
                'gaji_pokok' => $karyawan->gaji_pokok
            ]);

            if ($gaji->historyKinerja->count() > 0) {
                $gaji->deleteHistoryKinerja($row['unit']);
            }

            $store = $gaji->historyKinerja()
                ->createMany($this->kinerjaToArray($row, $karyawan));
            ProcessPayroll::dispatch($karyawan, $bln);

            return $store;
        });
    }

    public function kinerjaToArray($row, $data)
    {
        $toArray = [];
        $bln = $this->bln;

        foreach ($data->persentaseKinerja as $item) {
            $toArray[] = [
                'bulan' => $bln,
                'title' => $item->title,
                'value' => $row[$item->title],
                'after_count' => $item->persen * $row[$item->title],
                'unit' => $row['unit']
            ];
        }

        return $toArray;
    }

    public function rules(): array
    {
        $unit = Unit::pluck('id', 'nama_unit')->toArray();
        $rules = [
            'nama_lengkap' => ['string', 'required'],
            'no_induk' => ['required', function ($attribute, $value, $onFailure) {
                if (!Karyawan::where('no_induk', $value)->exists()) {
                    $onFailure("No induk {$value} tidak tersedia");
                }
            }],
            'unit' => ['required', function ($attribute, $value, $onFailure) use ($unit) {
                if (!isset($unit[$value])) {
                    $onFailure('Unit tidak sesuai dengan database');
                }
            }],
        ];

        foreach (PersentaseKinerja::pluck('title') as $item) {
            $rules[$item] = ['numeric', function ($attribute, $value, $onFailure) {
                if ($value > 100) {
                    $onFailure("{$item} tidak boleh lebih dari 100");
                }
            }];
        }

        return $rules;
    }

    public function customValidationMessages()
    {
        return [
            'nama_lengkap.required' => ':attribute tidak boleh kosong',
            'no_induk.required' => ':attribute tidak boleh kosong',
            'no_induk.digits' => ':attribute harus 6 digit',
            'no_induk.unique' => ':attribute sudah tersedia',
            'unit.required' => ':attribute tidak boleh kosong',
        ];
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
