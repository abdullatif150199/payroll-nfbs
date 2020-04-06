<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Insentif;

class InsentifController extends Controller
{
    public function index()
    {
        $title = 'Insentif';
        return view('insentif.index', ['title' => $title]);
    }

    public function getInsentif(Request $request)
    {
        if (!$request->bulan) {
            $bulan = date('Y-m');
            $data = Insentif::with('karyawan')->where('bulan', $bulan)->get();
        } else {
            $data = Insentif::with('karyawan')->where('bulan', $request->bulan)->get();
        }

        return Datatables::of($data)
            ->editColumn('no_induk', function($data) {
                return '<span class="text-muted">'. $data->karyawan->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->editColumn('jumlah', function($data) {
                return number_format($data->jumlah);
            })
            ->addColumn('actions', function($data) {
                return view('insentif.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'no_induk', 'nama_lengkap', 'jumlah'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_insentif' => 'required|min:1|max:10',
            'jumlah' => 'required|min:4|max:15'

        ]);

        $data = [
            'karyawan_id' => $request->karyawan_id,
            'jenis_insentif' => $request->jenis_insentif,
            'bulan' => $request->year . '-' . $request->month,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ];

        $store = Insentif::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = Insentif::with('karyawan')->find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_insentif' => 'required|min:1|max:10',
            'jumlah' => 'required|min:4|max:15'
        ]);

        $update = Insentif::find($id);
        $update->jenis_insentif = $request->jenis_insentif;
        $update->bulan = $request->year . '-' . $request->month;
        $update->jumlah = $request->jumlah;
        $update->keterangan = $request->keterangan;
        $update->update();

        return $update;
    }

    public function destroy($id)
    {
        $get = Insentif::with('karyawan')->findOrFail($id);

        $get->delete();

        return back()->withSuccess('Insentif ' . $get->karyawan->nama_lengkap . ' berhasil dihapus!');
    }
}
