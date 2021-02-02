<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\StatusKerja;
use App\Models\KelompokKerja;
use App\Models\JamPerpekan;
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
use Illuminate\Support\Facades\Cache;

class BulkImport implements
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
        $user = User::create([
            'username' => $row['no_induk'],
            'name' => $row['nama_lengkap'],
            'email' => $row['email'],
            'password' => bcrypt(date('dmY', strtotime($row['tanggal_lahir'])))
        ]);

        $user->karyawan()->create([
            'golongan_id' => Cache::get('golongan')[strtoupper($row['golongan'])],
            'status_kerja_id' => Cache::get('status_kerja')[$row['status_kerja']],
            'kelompok_kerja_id' => Cache::get('kelompok_kerja')[strtoupper($row['kelompok_kerja'])],
            'no_induk' => $row['no_induk'],
            'nik' => $row['nik'],
            'nama_lengkap' => $row['nama_lengkap'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $this->dateToSql($row['tanggal_lahir']),
            'jenis_kelamin' => strtoupper($row['jenis_kelamin']),
            'status_pernikahan' => strtoupper($row['status_pernikahan']),
            'alamat' => $row['alamat'],
            'no_hp' => $row['no_hp'],
            'nama_pendidikan' => $row['nama_pendidikan'],
            'pendidikan_terakhir' => strtoupper($row['pendidikan_terakhir']),
            'jurusan' => $row['jurusan'],
            'tahun_lulus' => $row['tahun_lulus'],
            'tanggal_masuk' => $this->dateToSql($row['tanggal_masuk']),
            'nama_bank' => $row['nama_bank'],
            'no_rekening' => $row['no_rekening'],
            'rekening_atas_nama' => $row['rekening_atas_nama'],
            'status' => Cache::get('status')[strtolower($row['status'])],
            'tipe_kerja' => strtolower($row['tipe_kerja']),
            'jam_perpekan_id' => Cache::get('jam_perpekan')[$row['jam_perpekan']],
            'contract_expired' => $this->dateToSql($row['contract_expired']),
            'pembayaran' => $row['pembayaran']
        ]);

        return $user;
    }

    public function rules(): array
    {
        $golongan = Cache::remember('golongan', 60, function () {
            return Golongan::pluck('id', 'kode_golongan');
        });
        $jabatan = Cache::remember('jabatan', 60, function () {
            return Jabatan::pluck('id', 'nama_jabatan');
        });
        $status_kerja = Cache::remember('status_kerja', 60, function () {
            return StatusKerja::pluck('id', 'nama_status_kerja');
        });
        $kelompok_kerja = Cache::remember('kelompok_kerja', 60, function () {
            return KelompokKerja::pluck('id', 'grade');
        });
        $jam_perpekan = Cache::remember('jam_perpekan', 60, function () {
            return JamPerpekan::pluck('id', 'jml_jam');
        });

        $status = Cache::remember('status', 60, function () {
            return ['guru' => 1, 'non guru' => 2];
        });

        $jenis_kelamin = ['L','P'];
        $status_pernikahan = ['M', 'B', 'D', 'J'];
        $pendidikan_terakhir = ['TS','SD','SMP','SMA','D3','S1','S2','S3'];
        $tipe_kerja = ['shift','non shift'];
        $pembayaran = ['cash','transfer'];

        return [
            'nama_lengkap' => ['string', 'required'],
            'no_induk' => ['required', 'digits:6'],
            '*.email' => ['email', 'unique:users,email'],
            'nik' => ['numeric', 'required', 'digits:16'],
            'alamat' => ['string', 'required'],
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
            'no_hp' => ['numeric', function ($attribute, $value, $onFailure) {
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
            'jabatan' => ['required', function ($attribute, $value, $onFailure) use ($jabatan) {
                if (!isset($jabatan[$value])) {
                    $onFailure('jabatan tidak sesuai dengan database');
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
            }]
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nama_lengkap.required' => ':attribute tidak boleh kosong',
            'no_induk.required' => ':attribute tidak boleh kosong',
            'no_induk.digits' => ':attribute harus 6 digit',
            'nik.required' => ':attribute tidak boleh kosong',
            'nik.numeric' => ':attribute harus berupa angka',
            'nik.digits' => ':attribute harus 16 digit',
            'tempat_lahir.numeric' => ':attribute tidak boleh kosong',
            'alamat.required' => ':attribute tidak boleh kosong',
            'nama_pendidikan.required' => ':attribute tidak boleh kosong'
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

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function dateToSql($value, $format = 'Y-m-d')
    {
        return date($format, strtotime($this->transformDate($value)));
    }
}
