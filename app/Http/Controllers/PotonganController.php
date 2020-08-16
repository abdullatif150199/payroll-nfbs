<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Karyawan;
use App\Models\Potongan;

class PotonganController extends Controller
{
    public function index()
    {
        $title = 'Potongan';
        $potongan = Potongan::all();
        return view('potongan.index', ['title' => $title, 'potongan' => $potongan]);
    }

    public function name(Request $request)
    {
        $data = Potongan::select('id', 'nama_potongan')
             ->where('nama_potongan', 'LIKE', '%'.$request->q.'%')->get();

        return response()->json($data);
    }

    public function datatable()
    {
        $data = Karyawan::with('potongan')->get();

        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return view('potongan.actions', ['data' => $data]);
            })
            ->editColumn('jenis_potongan', function($data) {
                return view('potongan.types', ['data' => $data]);
            })
            ->rawColumns(['actions', 'jenis_potongan'])
            ->make('true');
    }

    public function store(Request $request)
    {
        if ($request->type === 'decimal') {
            $this->validate($request, [
                'nama_potongan' => 'min:2|max:20',
                'jumlah_potongan' => 'required|max:22'
            ]);

            $jumlah_potongan = str_replace('.', '', $request->jumlah_potongan);
        } else {
            $this->validate($request, [
                'nama_potongan' => 'min:2|max:20',
                'jumlah_persentase' => 'required|max:3',
                'jenis_persentase' => 'required'
            ]);

            $jumlah_potongan = substr($request->jumlah_persentase/100, 0, 4) . '*' . $request->jenis_persentase;
        }

        $data = [
            'nama_potongan' => $request->nama_potongan,
            'jumlah_potongan' => $jumlah_potongan,
            'type' => $request->type
        ];

        return Potongan::create($data);
    }

    public function show($id)
    {
        $get = Karyawan::with('potongan')->findOrFail($id);

        return $get;
    }

    public function edit($id)
    {
        $get = Potongan::with('karyawan')->find($id);

        return $get;
    }

    public function update(Request $request, $id)
    {
        if ($request->type === 'decimal') {
            $this->validate($request, [
                'nama_potongan' => 'min:2|max:20',
                'jumlah_potongan' => 'required|max:22'
            ]);

            $jumlah_potongan = str_replace('.', '', $request->jumlah_potongan);
        } else {
            $this->validate($request, [
                'nama_potongan' => 'min:2|max:20',
                'jumlah_persentase' => 'required|max:3',
                'jenis_persentase' => 'required'
            ]);

            $jumlah_potongan = substr($request->jumlah_persentase/100, 0, 4) . '*' . $request->jenis_persentase;
        }

        $pot = Potongan::findOrFail($id);
        $pot->nama_potongan = $request->nama_potongan;
        $pot->jumlah_potongan = $jumlah_potongan;
        $pot->type = $request->type;
        $pot->update();

        return $pot;
    }

    public function attach(Request $request, $id)
    {
        $karyawan = Karyawan::with('potongan')->findOrFail($id);
        $date = $request->end_at['year'].'-'.$request->end_at['month'].'-28';
        $karyawan->potongan()->sync([$request->potongan_id => ['end_at' => $date]], false);

        return redirect()->back()->withSuccess("Potongan berhasil di tambahkan ke {$karyawan->nama_lengkap}.");
    }

    public function detach($id_potongan, $id_karyawan)
    {
        $potongan = Potongan::with('karyawan')->findOrFail($id_potongan);
        $potongan->karyawan()->detach($id_karyawan);

        return redirect()->back()->withSuccess(sprintf('Potongan %s berhasil di hapus.', $potongan->nama_potongan));
    }

    public function destroy($id)
    {
        Potongan::destroy($id);
    }
}
