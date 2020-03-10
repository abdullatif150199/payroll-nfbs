<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Libraries\SheetDB;
use App\Models\User;

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

        foreach ($this->generator() as $item) {
            $data = User::where('username', $item->no_induk)->first();
            if (!$data) {
                $user = User::create([
                    'name' => $item->nama_lengkap,
                    'username' => $item->no_induk,
                    'email' => $item->email,
                    'password' => substr($item->no_hp, -6)
                ]);

                if ($user->exists) {
                    $user->karyawan()->create([
                        'golongan_id' => $item->golongan_id,
                        'jabatan_id' => $item->jabatan_id,
                        'status_kerja_id' => $item->status_kerja_id,
                        'no_induk' => $item->no_induk,
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

                    $success++;
                } else {
                    $errors[] = [
                        'status' => 'fail',
                        'message' => 'Gagal menyimpan data ' . $item->nama_lengkap
                    ];
                }

            } else {
                $errors[] = [
                    'status' => 'fail',
                    'message' => 'Data ' . $item->nama_lengkap .' sudah tersedia'
                ];
            }
        }

        return back()->with('success', 'Data berhasil ditambahkan, Success: ' . $success . ' Error: ' . count($errors))
                ->with('errorItems', $errors);
    }

    private function generator()
    {
        $sheets = SheetDB::get('https://sheetdb.io/api/v1/xcee4p1plta9x');

        foreach ($sheets as $sheet) {
            yield $sheet;
        }
    }
}
