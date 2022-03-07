<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KaryawanFormRequest;
use Illuminate\Database\Eloquent\Builder;
use Yajra\Datatables\Datatables;
use App\Jobs\AddTarifLembur;
use App\Models\Karyawan;
use App\Models\StatusKerja;
use App\Models\KelompokKerja;
use App\Models\JamAjar;
use App\Models\JamPerpekan;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Bidang;
use App\Models\Unit;
use App\Models\User;
use App\Models\Tax;
use App\Models\Setting;

class KaryawanController extends Controller
{
    public function index()
    {
        $title = 'Pegawai';
        $bidang = Bidang::select('id', 'nama_bidang')->get();
        $golongan = Golongan::select('id', 'kode_golongan')->get();
        $jabatan = Jabatan::select('id', 'nama_jabatan')->get();
        $unit = Unit::select('id', 'nama_unit')->get();
        $status_kerja = StatusKerja::select('id', 'nama_status_kerja')->get();
        $kelompok_kerja = KelompokKerja::select('id', 'grade')->get();
        $jam_ajar = JamAjar::select('id', 'jml', 'ket')->get();
        $jam_perpekan = JamPerpekan::select('id', 'jml_jam', 'keterangan')->get();
        $taxes = Tax::pluck('kode', 'id');

        return view('karyawan.index', [
            'title' => $title,
            'golongan' => $golongan,
            'jabatan' => $jabatan,
            'bidang' => $bidang,
            'unit' => $unit,
            'status_kerja' => $status_kerja,
            'kelompok_kerja' => $kelompok_kerja,
            'jam_ajar' => $jam_ajar,
            'jam_perpekan' => $jam_perpekan,
            'taxes' => $taxes
        ]);
    }

    public function name(Request $request)
    {
        $user = auth()->user();

        if ($user->hasRole(['admin', 'root'])) {
            $data = Karyawan::with('persentasekinerja', 'unit')->select('id', 'nama_lengkap', 'no_induk')
                ->where('nama_lengkap', 'LIKE', '%' . $request->q . '%')->get();
        } else {
            $data = Karyawan::with('persentasekinerja', 'unit')->select('id', 'nama_lengkap', 'no_induk')
                ->where('nama_lengkap', 'LIKE', '%' . $request->q . '%')
                ->whereHas('bidang', function (Builder $query) use ($user) {
                    $query->whereIn('nama_bidang', $user->karyawan->bidang->pluck('nama_bidang'));
                })->get();
        }

        return response()->json($data);
    }

    public function datatable(Request $request)
    {
        $user = auth()->user();

        if ($user->hasRole(['admin', 'root'])) {
            $data = Karyawan::with(['jabatan', 'golongan', 'statusKerja', 'unit'])
                ->when($request->statuskerja, function ($q) use ($request) {
                    $q->where('status_kerja_id', $request->statuskerja);
                })
                ->when($request->bidang, function ($q) use ($request) {
                    $q->whereHas('bidang', function ($query) use ($request) {
                        $query->where('id', $request->bidang);
                    });
                })
                ->where('status', '<>', 3)->get();
        } else {
            $data = Karyawan::with(['jabatan', 'golongan', 'statusKerja', 'unit'])
                ->when($request->statuskerja, function ($q) use ($request) {
                    $q->where('status_kerja_id', $request->statuskerja);
                })
                ->whereHas('bidang', function (Builder $query) use ($user) {
                    $query->whereIn('nama_bidang', $user->karyawan->bidang->pluck('nama_bidang'));
                })
                ->orWhereHas('unit', function (Builder $query) use ($user) {
                    $query->whereIn('nama_unit', $user->karyawan->unit->pluck('nama_unit'));
                })
                ->where('status', '<>', 3)->get();
        }

        if ($request->statuskerja == 'berhenti') {
            $data = Karyawan::with(['jabatan', 'golongan', 'statusKerja', 'unit'])
                ->where('status', 3)->get();
        }

        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return view('karyawan.actions', ['data' => $data]);
            })
            ->editColumn('nama_lengkap', function ($data) {
                return view('karyawan.nama', ['data' => $data]);
            })
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">' . $data->no_induk . '</span>';
            })
            ->editColumn('jabatan', function ($data) {
                return view('karyawan.jabatan', ['jabatan' => $data->jabatan]);
            })
            ->editColumn('golongan', function ($data) {
                return $data->golongan->kode_golongan . '/' . $data->kelompokKerja->grade;
            })
            ->editColumn('unit', function ($data) {
                return view('karyawan.unit', ['unit' => $data->unit]);
            })
            ->editColumn('status_kerja', function ($data) {
                return $data->statusKerja->nama_status_kerja;
            })
            ->rawColumns(['actions', 'nama_lengkap', 'jabatan', 'golongan', 'no_induk', 'unit', 'status_kerja'])
            ->make(true);
    }

    public function store(KaryawanFormRequest $request)
    {
        // dapatkan no_induk
        $kel = KelompokKerja::findOrFail($request->kelompok_kerja);
        $setting = Setting::where('key', 'no_urut_induk_terbaru')->first();
        $first = $kel->no_kode;
        $second = $request->tanggal_masuk['year'] - config('var.tahun_berdiri');
        $third = $setting->value;
        $no_induk = $first . $second . $third;

        // Check username
        $check = User::where('username', $no_induk)->first();
        if ($check) {
            $no_induk = $first . $second . mt_rand(111, 999);
        }

        $user = User::create([
            'name' => $request->nama_lengkap,
            'username' => $no_induk,
            'email' => $request->email,
            'password' => bcrypt($request->birth['day'] . $request->birth['month'] . $request->birth['year']),
        ]);

        $user->assignRole('user');

        $request->merge([
            'user_id' => $user->id,
            'no_induk' => $no_induk,
            'golongan_id' => $request->golongan,
            'status_kerja_id' => $request->status_kerja,
            'kelompok_kerja_id' => $request->kelompok_kerja,
            'jam_ajar_id' => $request->jam_ajar,
            'jam_perpekan_id' => $request->jam_perpekan,
            'tanggal_lahir' => $request->birth['year'] . '-' . $request->birth['month'] . '-' . $request->birth['day'],
            'tanggal_masuk' => $request->tanggal_masuk['year'] . '-' . $request->tanggal_masuk['month'] . '-' . $request->tanggal_masuk['day'],
            'contract_expired' => $request->akhir_kontrak['year'] . '-' . $request->akhir_kontrak['month'] . '-' . $request->akhir_kontrak['day'],
            'no_hp' => str_replace(' ', '', $request->no_hp)
        ]);

        $karyawan = Karyawan::create($request->all());
        $karyawan->jabatan()->attach($request->jabatan);
        $karyawan->bidang()->attach($request->bidang);
        $karyawan->unit()->attach($request->unit);

        AddTarifLembur::dispatch($karyawan);

        $setting->increment('value');

        return response()->json([
            'status' => 200,
            'message' => sprintf('Pegawai %s telah ditambahkan', $karyawan->nama_lengkap)
        ]);
    }

    public function show($id)
    {
        $data = Karyawan::with(
            'kehadiran',
            'bidang',
            'unit',
            'golongan',
            'jabatan',
            'kelompokKerja',
            'statuskerja',
            'persentasekinerja',
            'cuti',
            'potongan',
            'lembur',
            'keluarga',
            'insentif'
        )->findOrFail($id);

        return view('karyawan.rincian', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = Karyawan::with([
            'bidang',
            'unit',
            'golongan',
            'jabatan',
            'kelompokKerja',
            'statuskerja',
            'jamAjar',
            'jamPerpekan'
        ])->find($id);

        $data['bidang'] = $data->bidang;
        $data['unit'] = $data->unit;

        return $data;
    }

    public function update(KaryawanFormRequest $request, $id)
    {
        $request->merge([
            'golongan_id' => $request->golongan,
            'status_kerja_id' => $request->status_kerja,
            'kelompok_kerja_id' => $request->kelompok_kerja,
            'jam_ajar_id' => $request->jam_ajar,
            'jam_perpekan_id' => $request->jam_perpekan,
            'tanggal_lahir' => $request->birth['year'] . '-' . $request->birth['month'] . '-' . $request->birth['day'],
            'tanggal_masuk' => $request->tanggal_masuk['year'] . '-' . $request->tanggal_masuk['month'] . '-' . $request->tanggal_masuk['day'],
            'tanggal_keluar' => $request->tanggal_keluar['year'] . '-' . $request->tanggal_keluar['month'] . '-' . $request->tanggal_keluar['day'],
            'contract_expired' => $request->akhir_kontrak['year'] . '-' . $request->akhir_kontrak['month'] . '-' . $request->akhir_kontrak['day'],
            'no_hp' => str_replace(' ', '', $request->no_hp)
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->fill($request->all());
        $karyawan->save();
        $karyawan->jabatan()->sync($request->jabatan);
        $karyawan->bidang()->sync($request->bidang);
        $karyawan->unit()->sync($request->unit);

        AddTarifLembur::dispatch($karyawan);

        return response()->json([
            'status' => 200,
            'message' => sprintf('Pegawai %s telah diupdate', $karyawan->nama_lengkap)
        ]);
    }

    public function resign($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->tanggal_keluar = date('Y-m-d');
        $karyawan->status = 3;
        $karyawan->save();

        return redirect()->back()->withSuccess(sprintf('Pegawai %s telah resign :(', $karyawan->nama_lengkap));
    }

    public function estimasi(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $golongan = Golongan::findOrFail($request->golongan);
        $kelompok_kerja = KelompokKerja::findOrFail($request->kelompok_kerja);
        $tunj_fungsional = $golongan->gaji_pokok * $kelompok_kerja->persen;
        $status_kerja = StatusKerja::findOrFail($request->status_kerja);
        $gaji_pokok = $golongan->gaji_pokok * $status_kerja->persentase_gaji_pokok;

        $data = [
            'gaji_pokok' => number_format($gaji_pokok),
            'tunj_jabatan' => number_format($karyawan->tunj_jabatan),
            'tunj_struktural' => number_format($karyawan->tunj_struktural),
            'tunj_fungsional' => number_format($tunj_fungsional),
            'tunj_kinerja' => number_format($kelompok_kerja->kinerja_normal),
            'gatot' => number_format(array_sum([
                $gaji_pokok,
                $karyawan->tunj_jabatan,
                $karyawan->tunj_struktural,
                $tunj_fungsional,
                $kelompok_kerja->kinerja_normal
            ]))
        ];

        return response()->json([
            'status' => 200,
            'estimate' => $data,
            'message' => 'Estimasi gaji berhasil diperoleh'
        ]);
    }

    public function sms(Request $request)
    {
        sendSms($request->no_hp, $request->pesan);

        return response()->json([
            'status' => 200,
            'message' => 'SMS terkirim!'
        ]);
    }
}
