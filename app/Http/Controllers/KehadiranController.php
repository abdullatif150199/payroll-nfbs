<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Kehadiran;
use App\Models\Karyawan;
use App\Models\AttendanceApel;
use App\Models\ApelDay;

class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->list) {
            $title = 'Daftar Hadir Harian';
            return view('kehadiran.index', ['title' => $title]);
        } else {
            $list = ['persentase', 'apel', 'persentase-apel', 'jadwal-apel'];

            if (in_array($request->list, $list)) {
                if ($request->list === 'persentase') {
                    $title = 'Daftar Persentase Kehadiran';
                    return view('kehadiran.pilihan', ['title' => $title]);
                }

                if ($request->list === 'apel') {
                    $title = 'Daftar Kehadiran Apel';
                    return view('kehadiran.apel', ['title' => $title]);
                }

                if ($request->list === 'persentase-apel') {
                    return '';
                }

                if ($request->list === 'jadwal-apel') {
                    $title = 'Daftar Jadwal Apel';
                    return view('kehadiran.jadwal', ['title' => $title]);
                }
            } else {
                abort(404);
            }
        }
    }

    public function datatable(Request $request)
    {
        $tanggal = date('Y-m-d');
        if ($request->tanggal) {
            $tanggal = $request->tanggal;   
        }

        $data = Kehadiran::with('karyawan')
            ->where('tanggal', $tanggal)
            ->latest();

        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return view('kehadiran.actions', compact('data'));
            })
            ->editColumn('jumlah_jam', function ($data) {
                if ($data->karyawan->tipe_kerja !== 'shift') {
                    $result = sum_time(
                        $data->jam_masuk,
                        $data->jam_istirahat,
                        $data->jam_kembali,
                        $data->jam_pulang
                    ) ?? '<span class="tag tag-rounded tag-red">Undefined</span>';
                } else {
                    $result = sum_time_shift(
                        $data->jam_masuk,
                        $data->jam_pulang
                    ) ?? '<span class="tag tag-rounded tag-red">Undefined</span>';
                }

                return $result;
            })
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">'. $data->karyawan->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->rawColumns(['actions', 'jumlah_jam', 'no_induk', 'nama_lengkap'])
            ->make(true);
    }

    public function store(Request $request)
    {
        if (empty($request->req)) {
            # code...
        } else {
            if ($request->req == 'store-jadwal') {
                $request->validate([
                    'day_name' => 'required',
                    'start_time_at' => 'required|date_format:H:i',
                    'end_time_at' => 'required|date_format:H:i'
                ]);

                $stored = ApelDay::create($request->all());
            } else {
                abort(404);
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $get = null;

        if (!empty($request->edit)) {
            if ($request->edit == 'jadwal') {
                $get = ApelDay::findOrFail($id);
            }
        } else {
            $get = Kehadiran::findOrFail($id);
        }

        return $get;
    }

    public function update(Request $request, $id)
    {
        $updated = null;

        if (!empty($request->req)) {
            if ($request->req == 'update-jadwal') {
                $get = ApelDay::findOrFail($id);
                $updated = $get->update([
                    'day_name' => $request->day_name,
                    'start_time_at' => $request->start_time_at,
                    'end_time_at' => $request->end_time_at
                ]);
            }
        } else {
            $this->validate($request, [
                'jam_masuk' => 'required'
            ]);

            $get = Kehadiran::findOrFail($id);
            $updated = $get->update([
                'jam_masuk' => $request->jam_masuk,
                'jam_istirahat' => $request->jam_istirahat,
                'jam_kembali' => $request->jam_kembali,
                'jam_pulang' => $request->jam_pulang
            ]);
        }

        return $updated;
    }

    public function pilihan(Request $request)
    {
        // $data = Karyawan::find(1);
        // $persen = $this->persentaseKehadiran($data, 2);
        // dd($persen);
        if (!$request->dari_tanggal) {
            $dari = date('Y-m-d', strtotime('-1 weeks'));
            $sampai = date('Y-m-d');
            $range = ((strtotime($sampai) - strtotime($dari))/3600/24) + 1;

            $data = Karyawan::with(['jamperpekan', 'kehadiran' => function ($query) use ($dari, $sampai) {
                $query->whereBetween('tanggal', [$dari, $sampai]);
            }])->orderBy('nama_lengkap', 'asc');
        } else {
            $dari = date('Y-m-d', strtotime($request->dari_tanggal));
            $sampai = date('Y-m-d', strtotime($request->sampai_tanggal));
            $range = ((strtotime($sampai) - strtotime($dari))/3600/24) + 1;

            $data = Karyawan::with(['jamperpekan', 'kehadiran' => function ($query) use ($dari, $sampai) {
                $query->whereBetween('tanggal', [$dari, $sampai]);
            }])->orderBy('nama_lengkap', 'asc');
        }

        return Datatables::of($data)
            ->editColumn('jumlah_jam', function ($data) {
                $result = total_sum_time(
                    $data->kehadiran,
                    $data->tipe_kerja
                ) ?? '<span class="tag tag-rounded tag-red">Undefined</span>';

                return $result;
            })
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">'. $data->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                return $data->nama_lengkap;
            })
            ->editColumn('persentase', function ($data) use ($range) {
                $persen = $this->persentaseKehadiran($data, $range);
                return view('kehadiran.persentase', compact('persen'));
            })
            ->rawColumns(['jumlah_jam', 'no_induk', 'nama_lengkap', 'persentase'])
            ->make(true);
    }

    public function persentaseKehadiran($data, $range)
    {
        $jam_perhari = round($data->jamperpekan->jml_jam/$data->jamperpekan->jml_hari, 2);
        $jam_hadir = total_sum_time($data->kehadiran, $data->tipe_kerja, 'val');
        $jam_wajib = ($range * $jam_perhari) * 3600;

        if ($jam_wajib <= 0) {
            return 0;
        }

        $persen = ($jam_hadir/$jam_wajib) * 100;

        if ($persen > 100) {
            return 100;
        }

        return round($persen, 2);
    }

    public function apel(Request $request)
    {
        if (!$request->tanggal) {
            $tanggal = date('Y-m-d');
            $data = AttendanceApel::with('karyawan')->where('tanggal', $tanggal)->orderBy('created_at', 'desc')->get();
        } else {
            $data = AttendanceApel::with('karyawan')->where('tanggal', $request->tanggal)->orderBy('created_at', 'desc')->get();
        }

        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return '';
            })
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">'. $data->karyawan->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->editColumn('hari', function ($data) {
                return to_hari($data->hari);
            })
            ->editColumn('tanggal', function ($data) {
                return date('d-m-Y', strtotime($data->tanggal));
            })
            ->rawColumns(['actions', 'no_induk', 'nama_lengkap'])
            ->make(true);
    }

    public function jadwal()
    {
        $data = ApelDay::orderBy('created_at', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return view('kehadiran.actions_jadwal', ['data' => $data]);
            })
            ->editColumn('day_name', function ($data) {
                return to_hari($data->day_name);
            })
            ->editColumn('tanggal', function ($data) {
                return date('d-m-Y', strtotime($data->tanggal));
            })
            ->rawColumns(['actions', 'day_name', 'tanggal'])
            ->make(true);
    }

    public function destroy(Request $request, $id)
    {
        if (!empty($request->req)) {
            if ($request->req == 'destroy-jadwal') {
                ApelDay::destroy($id);
            }
        } else {
            # code...
        }

        return true;
    }
}
