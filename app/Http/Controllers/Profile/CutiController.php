<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\CutiRequest;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\Cuti;

class CutiController extends ProfileController
{
    public function index()
    {
        return view('profile.cuti.index', ['id' => $this->getId()]);
    }

    public function create()
    {
        return view('profile.cuti.create');
    }

    public function store(CutiRequest $request)
    {
        $request->merge(['karyawan_id' => $this->getId()]);
        Cuti::create($request->all());

        return redirect()->route('profile.cuti')
                ->with('success', 'Request berhasil di buat!');
    }

    public function edit($id)
    {
        $data = Cuti::findOrFail($id);
        return view('profile.cuti.create', compact($data));
    }

    public function datatable($id)
    {
        $data = Cuti::with('karyawan')->where('karyawan_id', $id)->get();

        return Datatables::of($data)
            ->editColumn('status', function ($data) {
                return view('profile.cuti.status', ['data' => $data]);
            })
            ->addColumn('progress', function ($data) {
                return view('profile.cuti.progress', ['data' => $data]);
            })
            ->editColumn('tgl_request', function ($data) {
                return '<span class="text-muted">'. yearMonth(date('Y-m-d', strtotime($data->created_at))) .'</span>';
            })
            ->rawColumns(['status', 'progress', 'tgl_request'])
            ->make(true);
    }
}
