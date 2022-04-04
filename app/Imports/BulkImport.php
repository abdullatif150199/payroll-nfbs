<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Golongan;
use App\Models\Bidang;
use App\Models\Unit;
// use App\Models\Jabatan;
use App\Models\StatusKerja;
use App\Models\KelompokKerja;
use App\Models\JamPerpekan;
use App\Jobs\BulkImportJobs;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BulkImport implements
    OnEachRow,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
    WithBatchInserts,
    WithChunkReading
{
    use Importable, SkipsErrors, SkipsFailures;

    public $golongan;
    public $bidang;
    public $unit;
    public $status_kerja;
    public $kelompok_kerja;
    public $jam_perpekan;
    public $status;

    public function __construct()
    {
        $this->golongan = Golongan::pluck('id', 'kode_golongan')->toArray();
        $this->bidang = Bidang::pluck('id', 'nama_bidang')->toArray();
        $this->unit = Unit::pluck('id', 'nama_unit')->toArray();
        // $jabatan = Jabatan::pluck('id', 'nama_jabatan')->toArray();
        $this->status_kerja = StatusKerja::pluck('id', 'nama_status_kerja')->toArray();
        $this->kelompok_kerja = KelompokKerja::pluck('id', 'grade')->toArray();
        $this->jam_perpekan = JamPerpekan::pluck('id', 'jml_jam')->toArray();
        $this->status = ['guru' => 1, 'non guru' => 2];
    }

    public function onRow(Row $row)
    {
        DB::transaction(function () use ($row) {
            $user = User::create([
                'username' => $row['no_induk'],
                'name' => $row['nama_lengkap'],
                'email' => $row['email'] ?? null,
                'password' => bcrypt(date('dmY', strtotime($row['tanggal_lahir'])))
            ]);

            $user->assignRole('user');

            $karyawan = $user->karyawan()->create([
                'golongan_id' => $this->golongan[strtoupper($row['golongan'])],
                'status_kerja_id' => $this->status_kerja[$row['status_kerja']],
                'kelompok_kerja_id' => $this->kelompok_kerja[strtoupper($row['kelompok_kerja'])],
                'no_induk' => $row['no_induk'],
                'nik' => $row['nik'],
                'nama_lengkap' => $row['nama_lengkap'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $this->dateToSql($row['tanggal_lahir']),
                'jenis_kelamin' => strtoupper($row['jenis_kelamin']),
                'status_pernikahan' => strtoupper($row['status_pernikahan']),
                'alamat' => $row['alamat'] ?? null,
                'no_hp' => $row['no_hp'],
                'nama_pendidikan' => $row['nama_pendidikan'],
                'pendidikan_terakhir' => strtoupper($row['pendidikan_terakhir']),
                'jurusan' => $row['jurusan'],
                'tahun_lulus' => $row['tahun_lulus'],
                'tanggal_masuk' => $this->dateToSql($row['tanggal_masuk']),
                'nama_bank' => $row['nama_bank'],
                'no_rekening' => $row['no_rekening'],
                'rekening_atas_nama' => $row['rekening_atas_nama'],
                'status' => $this->status[strtolower($row['status'])],
                'tipe_kerja' => strtolower($row['tipe_kerja']),
                'jam_perpekan_id' => $this->jam_perpekan[$row['jam_perpekan']],
                'contract_expired' => $this->dateToSql($row['contract_expired']),
                'pembayaran' => $row['pembayaran']
            ]);

            BulkImportJobs::dispatch($karyawan, $row);

            return $user;
        });
    }

    public function rules(): array
    {
        $golongan = $this->golongan;
        $bidang = $this->bidang;
        $unit = $this->unit;
        $status_kerja = $this->status_kerja;
        $kelompok_kerja = $this->kelompok_kerja;
        $jam_perpekan = $this->jam_perpekan;
        $status = $this->status;

        $jenis_kelamin = ['L', 'P'];
        $status_pernikahan = ['M', 'B', 'D', 'J'];
        $pendidikan_terakhir = ['TS', 'SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'];
        $tipe_kerja = ['shift', 'non shift'];
        $pembayaran = ['cash', 'transfer'];

        return [
            'nama_lengkap' => ['string', 'required'],
            '*.email' => ['nullable', 'email', 'unique:users,email'],
            'nik' => ['numeric', 'required', 'digits:16'],
            'alamat' => ['string', 'nullable'],
            'nama_pendidikan' => ['string', 'required'],
            'tahun_lulus' => ['numeric', 'nullable', 'digits:4'],
            'nama_bank' => ['string', 'nullable'],
            'no_rekening' => ['numeric', 'nullable'],
            'rekening_atas_nama' => ['string', 'nullable'],
            'tempat_lahir' => ['string', 'required'],
            'tanggal_lahir' => ['required', function ($attribute, $value, $onFailure) {
                if (!(bool)strtotime($this->transformDate($value))) {
                    $onFailure('format tanggal_lahir salah');
                }
            }],
            'tanggal_masuk' => ['nullable', function ($attribute, $value, $onFailure) {
                if (!(bool)strtotime($this->transformDate($value))) {
                    $onFailure('format tanggal_masuk salah');
                }
            }],
            'contract_expired' => ['nullable', function ($attribute, $value, $onFailure) {
                if (!(bool)strtotime($this->transformDate($value))) {
                    $onFailure('format contract_expired salah');
                }
            }],
            'no_hp' => ['nullable', 'numeric', function ($attribute, $value, $onFailure) {
                if (strlen($value) > 14) {
                    $onFailure('no_hp tidak boleh lebih dari 14 digit');
                }
                if (strlen($value) < 9) {
                    $onFailure('no_hp tidak boleh kurang dari 9 digit');
                }
            }],
            'golongan' => ['required', function ($attribute, $value, $onFailure) use ($golongan) {
                if (!isset($golongan[strtoupper($value)])) {
                    $onFailure('golongan tidak sesuai dengan database');
                }
            }],
            'bidang' => ['required', function ($attribute, $value, $onFailure) use ($bidang) {
                $items = explode('/', $value);
                foreach ($items as $item) {
                    if (!isset($bidang[$item])) {
                        $onFailure('Bidang ' . $item . ' tidak sesuai dengan database');
                    }
                }
            }],
            'unit' => ['required', function ($attribute, $value, $onFailure) use ($unit) {
                $items = explode('/', $value);
                foreach ($items as $item) {
                    if (!isset($unit[$item])) {
                        $onFailure('Unit ' . $item . ' tidak sesuai dengan database');
                    }
                }
            }],
            'status_kerja' => ['required', function ($attribute, $value, $onFailure) use ($status_kerja) {
                if (!isset($status_kerja[$value])) {
                    $onFailure('status_kerja tidak sesuai dengan database');
                }
            }],
            'kelompok_kerja' => ['required', function ($attribute, $value, $onFailure) use ($kelompok_kerja) {
                if (!isset($kelompok_kerja[strtoupper($value)])) {
                    $onFailure('kelompok_kerja tidak sesuai dengan database');
                }
            }],
            'jam_perpekan' => ['required', function ($attribute, $value, $onFailure) use ($jam_perpekan) {
                if (!isset($jam_perpekan[$value])) {
                    $onFailure('jam_perpekan tidak sesuai dengan database');
                }
            }],
            'status' => ['required', function ($attribute, $value, $onFailure) use ($status) {
                if (!isset($status[strtolower($value)])) {
                    $onFailure('status tidak tersedia (pilihan: guru/non guru)');
                }
            }],
            'jenis_kelamin' => ['required', function ($attribute, $value, $onFailure) use ($jenis_kelamin) {
                if (!in_array(strtoupper($value), $jenis_kelamin)) {
                    $onFailure('jenis_kelamin tidak tersedia (pilihan: L/P)');
                }
            }],
            'status_pernikahan' => ['required', function ($attribute, $value, $onFailure) use ($status_pernikahan) {
                if (!in_array(strtoupper($value), $status_pernikahan)) {
                    $onFailure('status_pernikahan tidak tersedia (pilihan: M/B/J/D)');
                }
            }],
            'pendidikan_terakhir' => ['required', function ($attribute, $value, $onFailure) use ($pendidikan_terakhir) {
                if (!in_array(strtoupper($value), $pendidikan_terakhir)) {
                    $onFailure('pendidikan_terakhir tidak tersedia (pilihan: TS/SD/SMP/SMA/D3/S1/S2/S3)');
                }
            }],
            'tipe_kerja' => ['required', function ($attribute, $value, $onFailure) use ($tipe_kerja) {
                if (!in_array(strtolower($value), $tipe_kerja)) {
                    $onFailure('tipe_kerja tidak tersedia (pilihan: shift/non shift)');
                }
            }],
            'pembayaran' => ['required', function ($attribute, $value, $onFailure) use ($pembayaran) {
                if (!in_array(strtolower($value), $pembayaran)) {
                    $onFailure('pembayaran tidak tersedia (pilihan: transfer/cash)');
                }
            }],
            'no_induk' => ['required', 'digits:6', 'unique:users,username'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nama_lengkap.required' => ':attribute tidak boleh kosong',
            'email.required' => ':attribute tidak boleh kosong',
            'email.email' => ':attribute harus merupakan email',
            'email.unique' => ':attribute sudah tersedia',
            'no_induk.required' => ':attribute tidak boleh kosong',
            'no_induk.digits' => ':attribute harus 6 digit',
            'no_induk.unique' => ':attribute sudah tersedia',
            'nik.required' => ':attribute tidak boleh kosong',
            'nik.numeric' => ':attribute harus berupa angka',
            'nik.digits' => ':attribute harus 16 digit',
            'tempat_lahir.required' => ':attribute tidak boleh kosong',
            'alamat.required' => ':attribute tidak boleh kosong',
            'nama_pendidikan.required' => ':attribute tidak boleh kosong'
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function transformDate($value, $format = 'd/m/Y')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            try {
                return \Carbon\Carbon::createFromFormat($format, $value);
            } catch (\Throwable $th) {
                return false;
            }
        }
    }

    public function dateToSql($value, $format = 'Y-m-d')
    {
        return $this->transformDate($value)->format($format);
    }
}
