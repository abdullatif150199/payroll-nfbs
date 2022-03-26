<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Jobs\ProcessPayroll;
use App\Models\Lembur;
use App\Models\Karyawan;

class LemburController extends Controller
{
    public function index()
    {
        $title = 'Lembur';
        return view('lembur.index', ['title' => $title]);
    }

    public function datatable(Request $request)
    {
        $bulan = $request->bulan ?? date('Y-m');

        $data = Lembur::with('karyawan')
            ->when($request->bidang, function ($query) use ($request) {
                $query->whereHas('karyawan.bidang', function ($q) use ($request) {
                    $q->where('id', $request->bidang);
                });
            })
            ->bulan($bulan)->latest()->get();

        return Datatables::of($data)
            ->editColumn('tanggal', function ($data) {
                return '<span class="text-muted">'. yearMonth($data->date) .'</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->editColumn('total_tarif', function ($data) {
                return number_format($data->total_tarif);
            })
            ->addColumn('type', function ($data) {
                return view('lembur.tipe', ['data' => $data]);
            })
            ->addColumn('status', function ($data) {
                return view('lembur.status', ['data' => $data]);
            })
            ->addColumn('actions', function ($data) {
                return view('lembur.actions', ['data' => $data]);
            })
            ->rawColumns(['type', 'status', 'actions', 'tanggal', 'nama_lengkap', 'total_tarif'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jumlah_jam' => 'required',
            'type' => 'required',
        ]);

        $bln = $request->year . '-' . $request->month;
        $karyawan = Karyawan::with('golongan', 'jabatan')->find($request->karyawan_id);

        $total_lembur = !empty($request->tarif_manual) ? preg_replace('/\D/', '', $request->tarif_manual) : $this->totalLembur($request, $karyawan);

        $request->merge([
            'bulan' => $bln,
            'date' => $bln . '-' . $request->day,
            'status' => 'approve',
            'total_tarif' => $total_lembur
        ]);

        $store = $karyawan->lembur()->create($request->all());

        ProcessPayroll::dispatch($karyawan, $bln);

        return $store;
    }

    public function edit($id)
    {
        $get = Lembur::with('karyawan')->findOrFail($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $lembur = Lembur::with('karyawan')->findOrFail($id);
        $bln = $request->year .'-'. $request->month;

        if ($status = $request->status) {
            if ($status == 'approve') {
                $total_lembur = !empty($request->tarif_manual) ? preg_replace('/\D/', '', $request->tarif_manual) : $this->totalLembur($request, $lembur->karyawan);

                $lembur->update([
                    'total_tarif' => $total_lembur,
                    'status' => $status
                ]);

                ProcessPayroll::dispatch($lembur->karyawan, $bln);
            } else {
                $lembur->update([
                    'status' => $status
                ]);
            }
        } else {
            $total_lembur = !empty($request->tarif_manual) ? preg_replace('/\D/', '', $request->tarif_manual) : $this->totalLembur($request, $lembur->karyawan);

            $request->merge([
                'bulan' => $bln,
                'date' => $bln .'-'. $request->day,
                'total_tarif' => $total_lembur
            ]);

            $lembur->update($request->all());

            ProcessPayroll::dispatch($lembur->karyawan, $bln);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Ajuan lembur berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        $get = Lembur::findOrFail($id);
        $bln = $get->bulan;
        $karyawan = Karyawan::with('golongan', 'jabatan')->findOrFail($get->karyawan_id);
        $get->delete();

        ProcessPayroll::dispatch($karyawan, $bln);

        return response()->json([
            'status' => 200,
            'message' => 'lembur berhasil dihapus'
        ]);
    }

    public function totalLembur($request, $karyawan)
    {
        $max_jam = $karyawan->maks_jam_lembur;
        $tarif = $karyawan->golongan->lembur;
        //  Lembur hari kerja
        if ($request->type == 'day') {
            // kalo lembur lebih dari jam maksimal
            if ($request->jumlah_jam > $max_jam['day']) {
                $total_lembur = $max_jam['day'] * $tarif;
            } else {
                $total_lembur = $request->jumlah_jam * $tarif;
            }
        }
        //  Lembur hari libur
        if ($request->type == 'week') {
            // kalo lembur lebih dari jam maksimal
            if ($request->jumlah_jam > $max_jam['week']) {
                $total_lembur = $karyawan->tarifLembur->tarif; // tarif lembur harian
            } else {
                $total_lembur = $request->jumlah_jam * (2 * $tarif);
            }
        }
        //  Lembur hari raya, sebelum dan sesudah hari raya
        if ($request->type == 'holi') {
            // kalo lembur lebih dari jam maksimal
            $total_lembur = 2 * $karyawan->tarifLembur->tarif; // 2x tarif lembur harian
        }

        return $total_lembur;
    }
}
