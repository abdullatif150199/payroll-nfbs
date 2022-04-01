<?php

namespace App\Imports;

use App\Models\Karyawan;
use App\Models\PersentaseKinerja;
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

    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        DB::transaction(function () use ($row) {
            $bln = $request->year . '-' . $request->month;
            $karyawan = Karyawan::with('persentaseKinerja', 'gaji')
                ->findOrFail($row['no_induk']);

            $gaji = $karyawan->gaji()->updateOrCreate([
                'bulan' => $bln
            ], [
                'gaji_pokok' => $karyawan->gaji_pokok
            ]);

            if ($gaji->historyKinerja->count() > 0) {
                $gaji->deleteHistoryKinerja($request->unit);
            }

            $store = $gaji->historyKinerja()
                ->createMany($this->kinerjaToArray($request, $karyawan));
            ProcessPayroll::dispatch($karyawan, $bln);

            return $store;
        });
    }

    public function rules(): array
    {
        $rules = [
            'nama_lengkap' => ['string', 'required'],
            'no_induk' => ['required', 'digits:6', 'unique:users,username']
        ];

        foreach (PersentaseKinerja::pluck('title') as $item) {
            $rules[$item] = ['numeric', function ($attribute, $value, $onFailure) {
                if ($value > 100) {
                    $onFailure('produktifitas tidak boleh lebih dari 100');
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
