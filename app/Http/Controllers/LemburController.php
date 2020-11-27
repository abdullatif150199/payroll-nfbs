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
        if (!$request->bulan) {
            $bulan = date('Y-m');
            $data = Lembur::with('karyawan')->bulan($bulan)->latest()->get();
        } else {
            $data = Lembur::with('karyawan')->bulan($request->bulan)->latest()->get();
        }

        return Datatables::of($data)
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">'. $data->karyawan->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                return view('lembur.nama', ['data' => $data]);
            })
            ->editColumn('total_tarif', function ($data) {
                return number_format($data->total_tarif);
            })
            ->addColumn('status', function ($data) {
                return view('lembur.status', ['data' => $data]);
            })
            ->addColumn('actions', function ($data) {
                return view('lembur.actions', ['data' => $data]);
            })
            ->rawColumns(['status', 'actions', 'no_induk', 'nama_lengkap', 'total_tarif'])
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

        $max_jam = $karyawan->jabatan()->first()->maksimal_jam;
        $tarif = $karyawan->golongan->lembur;
        //  Lembur hari kerja
        if ($request->type == 'day') {
            // kalo lembur lebih dari jam maksimal
            if ($request->jumlah_jam > $max_jam) {
                $total_lembur = $max_jam * $tarif;
            } else {
                $total_lembur = $request->jumlah_jam * $tarif;
            }
        }
        //  Lembur hari libur/ahad
        if ($request->type == 'week') {
            // kalo lembur lebih dari jam maksimal
            if ($request->jumlah_jam > $max_jam) {
                $total_lembur = $karyawan->golongan->lembur_harian; // tarif lembur harian
            } else {
                $total_lembur = $request->jumlah_jam * $tarif;
            }
        }
        //  Lembur hari semester/hari raya
        if ($request->type == 'holi') {
            // kalo lembur lebih dari jam maksimal
            $total_lembur = $karyawan->golongan->lembur_harian; // 2x tarif lembur harian
        }

        $request->merge([
            'bulan' => $bln,
            'date' => $bln . '-' . $request->day,
            'total_tarif' => $total_lembur
        ]);

        $store = $karyawan->lembur()->create($request->all());

        ProcessPayroll::dispatch($karyawan, $bln);

        return $store;
    }

    public function edit($id)
    {
        $get = Lembur::with('karyawan')->find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_insentif' => 'required|min:1|max:10',
            'jumlah' => 'required|min:4|max:15'
        ]);

        $bln = $request->year . '-' . $request->month;

        $update = Lembur::with('karyawan')->findOrFail($id);
        $update->jenis_insentif = $request->jenis_insentif;
        $update->bulan = $bln;
        $update->jumlah = $request->jumlah;
        $update->keterangan = $request->keterangan;
        $update->update();

        ProcessPayroll::dispatch($update->karyawan, $bln);

        return $update;
    }

    public function destroy($id)
    {
        $get = Lembur::with('karyawan')->findOrFail($id);
        ProcessPayroll::dispatch($get->karyawan, $get->bulan);
        $get->delete();

        return back()->withSuccess('Insentif ' . $get->karyawan->nama_lengkap . ' berhasil dihapus!');
    }

    public function totalLembur($data)
    {
    }
}
