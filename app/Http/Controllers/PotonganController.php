<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Karyawan;
use App\Models\Potongan;
use App\Models\Rekening;

class PotonganController extends Controller
{
    public function index()
    {
        $title = 'Potongan';
        $potongan = Potongan::get();

        return view('potongan.index', [
            'title' => $title,
            'potongan' => $potongan
        ]);
    }

    public function list()
    {
        $title = 'Daftar Potongan';
        $rekening = Rekening::get();

        return view('potongan._index', [
            'title' => $title,
            'rekening' => $rekening
        ]);
    }

    public function name(Request $request)
    {
        $data = Potongan::select('id', 'nama_potongan')
            ->where('nama_potongan', 'LIKE', '%' . $request->q . '%')->get();

        return response()->json($data);
    }

    public function datatable(Request $request)
    {
        $data = Karyawan::with('potongan')
            ->when($request->bidang, function ($query) use ($request) {
                $query->whereHas('bidang', function ($q) use ($request) {
                    $q->where('id', $request->bidang);
                });
            })
            ->where('status', '<>', '3')->get();

        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return view('potongan.actions', ['data' => $data]);
            })
            ->editColumn('jenis_potongan', function ($data) {
                return view('potongan.types', ['data' => $data]);
            })
            ->rawColumns(['actions', 'jenis_potongan'])
            ->make('true');
    }

    public function daftarPotongan()
    {
        $data = Potongan::with('rekening')->latest();

        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return view('potongan._actions', ['data' => $data]);
            })
            ->editColumn('jumlah_potongan', function ($data) {
                return view('potongan._jumlah', ['data' => $data]);
            })
            ->editColumn('rekening', function ($data) {
                return view('potongan._rekening', ['rekening' => $data->rekening]);
            })
            ->rawColumns(['actions', 'jumlah_potongan', 'rekening'])
            ->make('true');
    }

    public function store(Request $request)
    {
        if ($request->type === 'decimal') {
            $this->validate($request, [
                'nama_potongan' => 'min:2|max:20',
                'jumlah_potongan' => 'required|max:22',
                'rekening_id' => 'required'
            ]);

            $jumlah_potongan = str_replace('.', '', $request->jumlah_potongan);
        } else {
            $this->validate($request, [
                'nama_potongan' => 'min:2|max:20',
                'jumlah_persentase' => 'required|max:5',
                'jenis_persentase' => 'required',
                'rekening_id' => 'required'
            ]);

            $jumlah_potongan = round(($request->jumlah_persentase / 100), 3) . '*' . $request->jenis_persentase;
        }

        $data = [
            'nama_potongan' => $request->nama_potongan,
            'jumlah_potongan' => $jumlah_potongan,
            'type' => $request->type,
            'rekening_id' => $request->rekening_id
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
                'jumlah_potongan' => 'required|max:22',
                'rekening_id' => 'required'
            ]);

            $jumlah_potongan = str_replace('.', '', $request->jumlah_potongan);
        } else {
            $this->validate($request, [
                'nama_potongan' => 'min:2|max:20',
                'jumlah_persentase' => 'required|max:5',
                'jenis_persentase' => 'required',
                'rekening_id' => 'required'
            ]);

            $jumlah_potongan = round(($request->jumlah_persentase / 100), 3) . '*' . $request->jenis_persentase;
        }

        $pot = Potongan::findOrFail($id);
        $pot->nama_potongan = $request->nama_potongan;
        $pot->jumlah_potongan = $jumlah_potongan;
        $pot->type = $request->type;
        $pot->rekening_id = $request->rekening_id;
        $pot->update();

        return $pot;
    }

    public function attach(Request $request, $id)
    {
        $karyawan = Karyawan::with('potongan')->findOrFail($id);
        $date = $request->end_at['year'] . '-' . $request->end_at['month'] . '-28';
        $karyawan->potongan()->sync([$request->potongan_id => ['end_at' => $date, 'qty' => $request->qty]], false);

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

    public function updatePivot(Request $request)
    {
        $potongan = Potongan::with('karyawan')->findOrFail($request->potongan_id);
        $date = $request->end_at['year'] . '-' . $request->end_at['month'] . '-28';
        $potongan->karyawan()->sync([$request->karyawan_id => ['end_at' => $date, 'qty' => $request->qty]], false);
        $potongan->qty = $request->qty;
        $potongan->end_at = $date;
        $potongan->end_at_format = date('M Y', strtotime($date));

        return response()->json($potongan, 200);
    }
}
