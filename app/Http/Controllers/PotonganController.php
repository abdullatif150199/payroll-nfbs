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
        return view('potongan.index', ['title' => $title]);
    }

    public function getPotongan()
    {
        $data = Karyawan::orderBy('created_at', 'desc');

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

    public function edit($id)
    {
        $get = Potongan::find($id);

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

    public function delete($id)
    {
        $pot = Potongan::findOrFail($id);
        $pot->delete();

        return redirect()->back()->withSuccess(sprintf('Potongan %s berhasil di hapus.', $pot->nama_potongan));
    }
}
