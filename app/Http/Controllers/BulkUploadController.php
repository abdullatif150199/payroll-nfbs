<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\SheetDB;
use App\Models\User;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\StatusKerja;
use App\Models\KelompokKerja;
use App\Models\JamPerpekan;

class BulkUploadController extends Controller
{
    public function index()
    {
        return view('bulk.index');
    }

    public function store()
    {
        $errors = [];
        $success = 0;

        $validate = $this->validateSheet($this->generate());

        dd($validate);

        foreach ($this->generate() as $item) {
            $user = User::firstOrCreate(['username' => $item->no_induk], [
                'name' => $item->nama_lengkap,
                'email' => $item->email,
                'password' => date('dmY', strtotime($item->tanggal_lahir))
            ]);

            if ($user->count() > 0) {
                $user->karyawan()->firstOrCreate(['no_induk' => $item->no_induk], [
                    'golongan_id' => $item->golongan_id,
                    'status_kerja_id' => $item->status_kerja_id,
                    'nik' => $item->nik,
                    'nama_lengkap' => $item->nama_lengkap,
                    'tempat_lahir' => $item->tempat_lahir,
                    'tanggal_lahir' => $item->tanggal_lahir,
                    'jenis_kelamin' => $item->jenis_kelamin,
                    'status_pernikahan' => $item->status_pernikahan,
                    'alamat' => $item->alamat,
                    'no_hp' => $item->no_hp,
                    'nama_pendidikan' => $item->nama_pendidikan,
                    'pendidikan_terakhir' => $item->pendidikan_terakhir,
                    'jurusan' => $item->jurusan,
                    'tahun_lulus' => $item->tahun_lulus,
                    'tanggal_masuk' => $item->tanggal_masuk_pegawai,
                    'nama_bank' => $item->nama_bank,
                    'no_rekening' => $item->no_rekening,
                    'rekening_atas_nama' => $item->rekening_atas_nama,
                    'status' => $item->status,
                    'tipe_kerja' => $item->tipe_kerja,
                    'jam_perpekan_id' => $item->jam_perpekan_id,
                ]);
            }
        }

        return back()->with('success', 'Data berhasil ditambahkan, Success: ' . $success . ' Error: ' . count($errors))
                ->with('errorItems', $errors);
    }

    public function validateSheet($generator)
    {
        $errors = [];
        $data = [];
        $head_row = 2;

        $golongan = Golongan::pluck('id', 'kode_golongan')->toArray();
        $jabatan = Jabatan::pluck('id', 'nama_jabatan')->toArray();
        $status_kerja = StatusKerja::pluck('id', 'nama_status_kerja')->toArray();
        $kelompok_kerja = KelompokKerja::pluck('id', 'grade')->toArray();
        $jam_perpekan = JamPerpekan::pluck('id', 'jml_jam')->toArray();
        $status = ['guru' => 1, 'non guru' => 2];

        $jenis_kelamin = ['L','P'];
        $status_pernikahan = ['M', 'B', 'D', 'J'];
        $pendidikan_terakhir = ['TS','SD','SMP','SMA','D3','S1','S2','S3'];
        $tipe_kerja = ['shift','non shift'];
        $pembayaran = ['cash','transfer'];

        foreach ($generator as $item) {
            $row = $head_row++;
            $err = [];
            $arr = [];

            if (!empty($item->no_induk)) {
                if (strlen($item->no_induk) != 6) {
                    $err += [
                        'no_induk' => 'Baris ke-'. $row .' no_induk harus 6 digit'
                    ];
                } else {
                    $arr += ['no_induk' => $item->no_induk];
                }
            } else {
                $err += [
                    'no_induk' => 'Baris ke-'. $row .' no_induk tidak boleh kosong'
                ];
            }

            if (empty($item->nama_lengkap)) {
                $err += [
                    'nama_lengkap' => 'Baris ke-'. $row .' nama_lengkap tidak boleh kosong'
                ];
            } else {
                $arr += ['nama_lengkap' => $item->nama_lengkap];
            }

            if (empty($item->email)) {
                $err += [
                    'email' => 'Baris ke-'. $row .' email tidak boleh kosong'
                ];
            } else {
                $arr += ['email' => $item->email];
            }

            if (!empty($item->golongan)) {
                if (!isset($golongan[strtoupper($item->golongan)])) {
                    $err += [
                        'golongan' => 'Baris ke-'. $row .' golongan tidak sesuai dg database'
                    ];
                } else {
                    $arr += ['golongan' => $item->golongan];
                }
            } else {
                $err += [
                    'golongan' => 'Baris ke-'. $row .' golongan tidak boleh kosong'
                ];
            }

            if (!empty($item->jabatan)) {
                if (!isset($jabatan[$item->jabatan])) {
                    $err += [
                        'jabatan' => 'Baris ke-'. $row .' jabatan tidak sesuai dg database'
                    ];
                }
            } else {
                $err += [
                    'jabatan' => 'Baris ke-'. $row .' jabatan tidak boleh kosong'
                ];
            }

            if (!empty($item->status_kerja)) {
                if (!isset($status_kerja[$item->status_kerja])) {
                    $err += [
                        'status_kerja' => 'Baris ke-'. $row .' status_kerja tidak sesuai dg database'
                    ];
                }
            } else {
                $err += [
                    'status_kerja' => 'Baris ke-'. $row .' status_kerja tidak boleh kosong'
                ];
            }

            if (!empty($item->kelompok_kerja)) {
                if (!isset($kelompok_kerja[strtoupper($item->kelompok_kerja)])) {
                    $err += [
                        'kelompok_kerja' => 'Baris ke-'. $row .' kelompok_kerja tidak sesuai dg database'
                    ];
                }
            } else {
                $err += [
                    'kelompok_kerja' => 'Baris ke-'. $row .' kelompok_kerja tidak boleh kosong'
                ];
            }

            if (!empty($item->jam_perpekan)) {
                if (!isset($jam_perpekan[$item->jam_perpekan])) {
                    $err += [
                        'jam_perpekan' => 'Baris ke-'. $row .' jam_perpekan tidak sesuai dg database'
                    ];
                }
            } else {
                $err += [
                    'jam_perpekan' => 'Baris ke-'. $row .' jam_perpekan tidak boleh kosong'
                ];
            }

            if (!empty($item->status)) {
                if (!isset($status[strtolower($item->status)])) {
                    $err += [
                        'status' => 'Baris ke-'. $row .' status tidak tersedia'
                    ];
                }
            } else {
                $err += [
                    'status' => 'Baris ke-'. $row .' status tidak boleh kosong'
                ];
            }

            if (!empty($item->nik)) {
                if (strlen($item->nik) != 16) {
                    $err += [
                        'nik' => 'Baris ke-'. $row .' nik harus 16 digit'
                    ];
                }
            } else {
                $err += [
                    'nik' => 'Baris ke-'. $row .' nik tidak boleh kosong'
                ];
            }

            if (empty($item->tempat_lahir)) {
                $err += [
                    'tempat_lahir' => 'Baris ke-'. $row .' tempat_lahir tidak boleh kosong'
                ];
            }

            if (!empty($item->tanggal_lahir)) {
                if (preg_match("/\d{4}\-\d{2}-\d{2}/", $item->tanggal_lahir) === 0) {
                    $err += [
                        'tanggal_lahir' => 'Baris ke-'. $row .' tanggal_lahir format harus YYYY-MM-DD'
                    ];
                }
            } else {
                $err += [
                    'tanggal_lahir' => 'Baris ke-'. $row .' tanggal_lahir tidak boleh kosong'
                ];
            }

            if (!empty($item->jenis_kelamin)) {
                if (!in_array($item->jenis_kelamin, $jenis_kelamin)) {
                    $err += [
                        'jenis_kelamin' => 'Baris ke-'. $row .' jenis_kelamin harus 1 digit'
                    ];
                }
            } else {
                $err += [
                    'jenis_kelamin' => 'Baris ke-'. $row .' jenis_kelamin tidak boleh kosong'
                ];
            }

            if (!empty($item->status_pernikahan)) {
                if (!in_array($item->status_pernikahan, $status_pernikahan)) {
                    $err += [
                        'status_pernikahan' => 'Baris ke-'. $row .' status_pernikahan harus 1 digit'
                    ];
                }
            } else {
                $err += [
                    'status_pernikahan' => 'Baris ke-'. $row .' status_pernikahan tidak boleh kosong'
                ];
            }

            if (empty($item->alamat)) {
                $err += [
                    'alamat' => 'Baris ke-'. $row .' alamat tidak boleh kosong'
                ];
            }

            if (empty($item->no_hp)) {
                $err += [
                    'no_hp' => 'Baris ke-'. $row .' no_hp tidak boleh kosong'
                ];
            }

            if (empty($item->nama_pendidikan)) {
                $err += [
                    'nama_pendidikan' => 'Baris ke-'. $row .' nama_pendidikan tidak boleh kosong'
                ];
            }

            if (!empty($item->pendidikan_terakhir)) {
                if (!in_array($item->pendidikan_terakhir, $pendidikan_terakhir)) {
                    $err += [
                        'pendidikan_terakhir' => 'Baris ke-'. $row .' pendidikan_terakhir tidak sesuai'
                    ];
                }
            } else {
                $err += [
                    'pendidikan_terakhir' => 'Baris ke-'. $row .' pendidikan_terakhir tidak boleh kosong'
                ];
            }

            if (!empty($item->tanggal_masuk)) {
                if (preg_match("/\d{4}\-\d{2}-\d{2}/", $item->tanggal_masuk) === 0) {
                    $err += [
                        'tanggal_masuk' => 'Baris ke-'. $row .' tanggal_masuk format harus YYYY-MM-DD'
                    ];
                }
            } else {
                $err += [
                    'tanggal_masuk' => 'Baris ke-'. $row .' tanggal_masuk tidak boleh kosong'
                ];
            }

            if (!empty($item->tipe_kerja)) {
                if (!in_array($item->tipe_kerja, $tipe_kerja)) {
                    $err += [
                        'tipe_kerja' => 'Baris ke-'. $row .' tipe_kerja tidak sesuai'
                    ];
                }
            } else {
                $err += [
                    'tipe_kerja' => 'Baris ke-'. $row .' tipe_kerja tidak boleh kosong'
                ];
            }

            if (!empty($item->contract_expired)) {
                if (preg_match("/\d{4}\-\d{2}-\d{2}/", $item->contract_expired) === 0) {
                    $err += [
                        'contract_expired' => 'Baris ke-'. $row .' contract_expired format harus YYYY-MM-DD'
                    ];
                }
            } else {
                $err += [
                    'contract_expired' => 'Baris ke-'. $row .' contract_expired tidak boleh kosong'
                ];
            }

            if (!empty($item->pembayaran)) {
                if (!in_array($item->pembayaran, $pembayaran)) {
                    $err += [
                        'pembayaran' => 'Baris ke-'. $row .' pembayaran tidak sesuai'
                    ];
                }
            } else {
                $err += [
                    'pembayaran' => 'Baris ke-'. $row .' pembayaran tidak boleh kosong'
                ];
            }
            dd($err);

            $data[] = $arr;
            $errors[] = $err;
        }

        dd($errors);

        if (count($errors) > 0) {
            $response = [
                'status' => false,
                'data' => $errors
            ];

            return $response;
        } else {
            $response = [
                'status' => true,
                'data' => $data
            ];

            return $response;
        }
    }

    public function generate()
    {
        $sheets = SheetDB::get('https://sheetdb.io/api/v1/y1g2seenlqd9q');

        foreach ($sheets as $sheet) {
            yield $sheet;
        }
    }
}
