<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Karyawan;
use App\Potongan;

class PotonganController extends Controller
{
    public function index()
    {
        $title = 'Potongan';
        $potongan = Potongan::all();
        return view('potongan.index', ['title' => $title, 'potongan' => $potongan]);
    }

    public function getPotongan()
    {
        $data = Karyawan::with('potongan')->latest();

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
        $this->validate($request, [
            'nama_potongan' => 'min:2|max:50',
            'jumlah_potongan' => 'max:22'
        ]);

        $pot = new Potongan;
        $pot->karyawan_id = $request->id;
        $pot->nama_potongan = $request->nama_potongan;
        $pot->jumlah_potongan = str_replace('.', '', $request->jumlah_potongan);
        $pot->save();

        return redirect()->back()->withSuccess(sprintf('Potongan %s berhasil di buat.', $pot->nama_potongan));
    }

    public function showPotonganKaryawan($id)
    {
        $get = karyawan::with('potongan')->findOrFail($id);

        return $get;
    }

    public function edit($id)
    {
        $get = Potongan::with('karyawan')->find($id);

        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_potongan' => 'min:2|max:50',
            'jumlah_potongan' => 'max:22'
        ]);

        $pot = Potongan::findOrFail($id);
        $pot->karyawan_id = $request->id;
        $pot->nama_potongan = $request->nama_potongan;
        $pot->jumlah_potongan = str_replace('.', '', $request->jumlah_potongan);
        $pot->save();

        return redirect()->back()->withSuccess(sprintf('Potongan %s berhasil di update.', $pot->nama_potongan));
    }

    public function attach(Request $request, $id)
    {
        $karyawan = Karyawan::with('potongan')->findOrFail($id);
        $karyawan->potongan()->detach();
        $karyawan->potongan()->attach($request->potongan);

        return redirect()->back()->withSuccess("Potongan berhasil di tambahkan ke {$karyawan->nama_lengkap}.");
    }

    public function detach($id_potongan, $id_karyawan)
    {
        $potongan = Potongan::with('karyawan')->findOrFail($id_potongan);
        $potongan->karyawan()->detach($id_karyawan);

        return redirect()->back()->withSuccess(sprintf('Potongan %s berhasil di hapus.', $potongan->nama_potongan));
    }
}
