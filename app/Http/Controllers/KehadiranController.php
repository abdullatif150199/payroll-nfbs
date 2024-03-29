<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Kehadiran;
use App\Models\Karyawan;
use App\Models\AttendanceApel;
use App\Models\ApelDay;
use App\Models\Bidang;
use App\Models\Unit;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KehadiranExport;

use App\Exports\KehadiranPegawaiExport;
use Carbon\Carbon;

class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Daftar Hadir Harian';
        $view = 'kehadiran.index';
        $list = [null, 'persentase', 'apel', 'persentase-apel', 'jadwal-apel'];
        $bidang = Bidang::pluck('nama_bidang', 'id');
        $unit = Unit::pluck('nama_unit', 'id');
        $karyawan = Karyawan::orderBy('nama_lengkap')->pluck('nama_lengkap', 'id');

        if (!in_array($request->list, $list)) {
            abort(404);
        }

        if ($request->list === 'persentase') {
            $title = 'Daftar Persentase Kehadiran';
            $view = 'kehadiran.pilihan';
        }

        if ($request->list === 'apel') {
            $title = 'Daftar Kehadiran Apel';
            $view = 'kehadiran.apel';
        }

        if ($request->list === 'persentase-apel') {
            $title = 'Daftar Persentase Apel';
            $view = '';
        }

        if ($request->list === 'jadwal-apel') {
            $title = 'Daftar Jadwal Apel';
            $view = 'kehadiran.jadwal';
        }

        return view($view, [
            'title' => $title,
            'bidang' => $bidang,
            'unit' => $unit,
            'karyawan' => $karyawan
        ]);
    }

    public function datatable(Request $request)
    {
        $data = Kehadiran::filterByUnitOrBidang($request)
            ->get();

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
                    ) ?? '<span class="tag tag-rounded tag-red">Incomplete</span>';
                } else {
                    $result = sum_time_shift(
                        $data->jam_masuk,
                        $data->jam_pulang
                    ) ?? '<span class="tag tag-rounded tag-red">Incomplete</span>';
                }

                return $result;
            })
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">' . $data->karyawan->no_induk . '</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->rawColumns(['actions', 'jumlah_jam', 'no_induk', 'nama_lengkap'])
            ->make(true);
    }

    public function store(Request $request)
    {
        if ($request->req == 'store-jadwal') {
            $request->validate([
                'day_name' => 'required',
                'start_time_at' => 'required|date_format:H:i',
                'end_time_at' => 'required|date_format:H:i'
            ]);

            $stored = ApelDay::create($request->all());
            return $stored;
        }

        abort(404);
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
            $range = ((strtotime($sampai) - strtotime($dari)) / 3600 / 24) + 1;

            $data = Karyawan::with(['jamperpekan', 'kehadiran' => function ($query) use ($dari, $sampai) {
                $query->whereBetween('tanggal', [$dari, $sampai]);
            }])->when($request->bidang, function ($query) use ($request) {
                $query->whereHas('bidang', function ($q) use ($request) {
                    $q->where('id', $request->bidang);
                });
            })->orderBy('nama_lengkap', 'asc');
        } else {
            $dari = date('Y-m-d', strtotime($request->dari_tanggal));
            $sampai = date('Y-m-d', strtotime($request->sampai_tanggal));
            $range = ((strtotime($sampai) - strtotime($dari)) / 3600 / 24) + 1;

            $data = Karyawan::with(['jamperpekan', 'kehadiran' => function ($query) use ($dari, $sampai) {
                $query->whereBetween('tanggal', [$dari, $sampai]);
            }])->when($request->bidang, function ($query) use ($request) {
                $query->whereHas('bidang', function ($q) use ($request) {
                    $q->where('id', $request->bidang);
                });
            })->orderBy('nama_lengkap', 'asc');
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
                return '<span class="text-muted">' . $data->no_induk . '</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                return $data->nama_lengkap;
            })
            ->editColumn('persentase', function ($data) use ($range, $dari, $sampai) {
                // $persen = $this->persentaseKehadiran($data, $range);
                $persen = $this->percentage($data, $range, $dari, $sampai);
                return view('kehadiran.persentase', compact('persen'));
            })
            ->rawColumns(['jumlah_jam', 'no_induk', 'nama_lengkap', 'persentase'])
            ->make(true);
    }

    public function persentaseKehadiran($data, $range)
    {
        $jam_perhari = round($data->jamperpekan->jml_jam / $data->jamperpekan->jml_hari, 2);
        $jam_hadir = total_sum_time($data->kehadiran, $data->tipe_kerja, 'val');
        $jam_wajib = ($range * $jam_perhari) * 3600;

        if ($jam_wajib <= 0) {
            return 0;
        }

        $persen = ($jam_hadir / $jam_wajib) * 100;

        if ($persen > 100) {
            return 100;
        }

        return round($persen, 2);
    }

    // persentasi mode tanpa hari ahad
    public function percentage($data, $range, $start, $end)
    {
        $jam_perhari = round($data->jamperpekan->jml_jam / $data->jamperpekan->jml_hari, 2);
        $jam_hadir = total_sum_time($data->kehadiran, $data->tipe_kerja, 'val');
        $jam_wajib = (($range - how_many_sundays($start, $end)) * $jam_perhari) * 3600;

        if ($jam_wajib <= 0) {
            return 0;
        }

        $persen = ($jam_hadir / $jam_wajib) * 100;

        if ($persen > 100) {
            return 100;
        }

        return round($persen, 2);
    }

    public function apel(Request $request)
    {
        $tanggal = $request->tanggal ? $request->tanggal : date('Y-m-d');

        $data = AttendanceApel::with('karyawan')
            ->when($request->bidang, function ($query) use ($request) {
                $query->whereHas('karyawan.bidang', function ($q) use ($request) {
                    $q->where('id', $request->bidang);
                });
            })
            ->where('tanggal', $tanggal)
            ->latest();

        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return '';
            })
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">' . $data->karyawan->no_induk . '</span>';
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

    public function unduh(Request $request)
    {
        $from = $request->dari_tanggal;
        $to = $request->sampai_tanggal;
        $export = new KehadiranExport($from, $to);

        return Excel::download($export, 'apel_' . date('d-m-Y') . '.xlsx');
    }

    // Download Rekap Kehadiran Pegawai - Semua atau Unit
    public function downloadAttendance(Request $request)
    {
        if (!$request->date_start && !$request->date_end) {
            $request->date_start = Carbon::now()->subDays(30)->format('Y-m-d');
            $request->date_end = Carbon::now()->format('Y-m-d');
        }

        $export = new KehadiranPegawaiExport($request->date_start, $request->date_end, $request->bidang, $request->unit);

        return Excel::download($export, 'kehadiran_' . date('d-m-Y') . 'dari ' . $request->date_start . ' sampai ' . $request->date_end . '.xlsx');
    }

    // Insert kehadiran pegawai yang dinas seharian

    public function insertview()
    {
        $title = 'Tambah Kehadiran';
        return view('kehadiran.insertview', [
            'title' => $title
        ]);
    }

    public function insert(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'karyawan_id' => 'required',
            'tanggal' => 'required',
        ]);

        // $karyawan = Karyawan::where('id', $request->karyawan_id)->first();
        $karyawan = Karyawan::find($request->karyawan_id);

        if (!$karyawan) {
            return;
        }

        $result = $karyawan->kehadiran()->firstOrCreate([
            'tanggal' => $request->tanggal
        ], ['jam_masuk' => '07:00:00', 'jam_istirahat' => '12:00:00', 'jam_kembali' => '13:15:00', 'jam_pulang' => '15:15:00']);

        return redirect()->route('dash.kehadiran');
    }
}
