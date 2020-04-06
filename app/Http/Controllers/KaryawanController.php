<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KaryawanFormRequest;
use Yajra\Datatables\Datatables;
use App\Models\Karyawan;
use App\Models\StatusKerja;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Bidang;
use App\Models\Unit;
use App\Models\User;

class KaryawanController extends Controller
{
    public function index()
    {
        $title = 'Karyawan';
        $bidang = Bidang::select('id', 'nama_bidang')->get();
        $golongan = Golongan::select('id', 'kode_golongan')->get();
        $jabatan = Jabatan::select('id', 'nama_jabatan')->get();
        $unit = Unit::select('id', 'nama_unit')->get();
        $status_kerja = StatusKerja::select('id', 'nama_status_kerja')->get();
        // $a = Karyawan::find(1);
        // dd($a->unit);
        return view('karyawan.index', [
            'title' => $title,
            'golongan' => $golongan,
            'jabatan' => $jabatan,
            'bidang' => $bidang,
            'unit' => $unit,
            'status_kerja' => $status_kerja
        ]);
    }

    public function getName(Request $request)
    {
        $data = Karyawan::select('id', 'nama_lengkap', 'no_induk')
            ->where('nama_lengkap', 'LIKE', '%'.$request->q.'%')->get();

        return response()->json($data);
    }

    public function getKaryawan(Request $request)
    {
        if ($request->statuskerja != 'berhenti') {
            $data = Karyawan::with(['jabatan', 'golongan', 'statusKerja', 'unit'])
                ->when($request->statuskerja, function($q) use($request) {
                    $q->where('status_kerja_id', $request->statuskerja);
                })->where('status', '<>', 3)->get();
        } else {
            $data = Karyawan::with(['jabatan', 'golongan', 'statusKerja', 'unit'])
                ->where('status', 3)->get();
        }

        return Datatables::of($data)
            ->addColumn('actions', function($data) {
                return view('karyawan.actions', ['data' => $data]);
            })
            ->editColumn('no_induk', function($data) {
                return '<span class="text-muted">'. $data->no_induk .'</span>';
            })
            ->editColumn('jabatan', function($data) {
                return $data->jabatan->nama_jabatan;
            })
            ->editColumn('golongan', function($data) {
                return $data->golongan->kode_golongan;
            })
            ->editColumn('unit', function($data) {
                return view('karyawan.unit', ['unit' => $data->unit]);
            })
            ->editColumn('status_kerja', function($data) {
                return $data->statusKerja->nama_status_kerja;
            })
            ->rawColumns(['actions', 'jabatan', 'golongan', 'no_induk', 'unit', 'status_kerja'])
            ->make(true);
    }

    public function store(KaryawanFormRequest $request)
    {
        $username = strtok($request->nama_lengkap, ' ') . substr($request->birth['year'], -2);
        $check = User::where('username', $username)->first();

        if ($check) {
            $username = strtok($request->nama_lengkap, ' ') . $request->birth['month'];
            if (User::where('username', $username)->first()) {
                $username = strtok($request->nama_lengkap, ' ') . $request->birth['day'];
            }
        }

        $user = User::create([
            'name' => $request->nama_lengkap,
            'username' => $username,
            'email' => $request->nama_lengkap . '@example.com',
            'password' => bcrypt($request->birth['day'] . $request->birth['month'] . $request->birth['year']),
        ]);

        $request->merge([
            'user_id' => $user->id,
            'golongan_id' => $request->golongan,
            'jabatan_id' => $request->jabatan,
            'status_kerja_id' => $request->status_kerja,
            'tanggal_lahir' => $request->birth['year'].'-'.$request->birth['month'].'-'.$request->birth['day'],
            'tanggal_masuk' => $request->tanggal_masuk['year'].'-'.$request->tanggal_masuk['month'].'-'.$request->tanggal_masuk['day'],
            'no_hp' => str_replace(' ', '', $request->no_hp)
        ]);

        $karyawan = Karyawan::create($request->all());
        $karyawan->bidang()->attach($request->bidang);
        $karyawan->unit()->attach($request->unit);

        return redirect()->back()->withSuccess(sprintf('Karyawan %s berhasil di tambahkan', $karyawan->nama_lengkap));
    }

    public function show($id)
    {
        $data = Karyawan::with(
            'kehadiran',
            'bidang',
            'unit',
            'golongan',
            'jabatan',
            'kelompokkerja',
            'statuskerja',
            'persentasekinerja',
            'cuti',
            'potongan',
            'lembur',
            'keluarga',
            'insentif'
        )->findOrFail($id);

        return view('karyawan.rincian', compact('data'));

    }

    public function edit($id)
    {
        $data = Karyawan::with(['bidang', 'unit'])->find($id);

        $data['bidang'] = $data->bidang;
        $data['unit'] = $data->unit;

        return $data;
    }

    public function update(KaryawanFormRequest $request, $id)
    {
        $request->merge([
            'golongan_id' => $request->golongan,
            'jabatan_id' => $request->jabatan,
            'status_kerja_id' => $request->status_kerja,
            'tanggal_lahir' => $request->birth['year'].'-'.$request->birth['month'].'-'.$request->birth['day'],
            'tanggal_masuk' => $request->tanggal_masuk['year'].'-'.$request->tanggal_masuk['month'].'-'.$request->tanggal_masuk['day'],
            'tanggal_keluar' => $request->tanggal_keluar['year'].'-'.$request->tanggal_keluar['month'].'-'.$request->tanggal_keluar['day'],
            'no_hp' => str_replace(' ', '', $request->no_hp)
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->fill($request->all());
        $karyawan->save();
        $karyawan->bidang()->sync($request->bidang);
        $karyawan->unit()->sync($request->unit);

        return redirect()->back()->withSuccess(sprintf('Karyawan %s berhasil di update', $karyawan->nama_lengkap));
    }

    public function resign($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->status = 3;
        $karyawan->save();

        return redirect()->back()->withSuccess(sprintf('Karyawan %s telah resign :(', $karyawan->nama_lengkap));
    }
}
