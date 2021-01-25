<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluarga;

class KeluargaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:150'
        ]);

        $keluarga = Keluarga::create([
            'karyawan_id' => $request->karyawan_id,
            'nama' => $request->nama,
            'status_keluarga_id' => $request->status_keluarga_id,
            'tanggal_lahir' => $request->birth['year'] .'-'. $request->birth['month'] .'-'. $request->birth['day'],
            'tunjangan_pendidikan' => $request->tunjangan_pendidikan,
            'akhir_tunj_penidikan' => $request->atp['year'] .'-'. $request->atp['month'] .'-'. $request->atp['day'],
            'akhir_tunj_keluarga' => $request->atk['year'] .'-'. $request->birth['month'] .'-'. $request->atk['day'],
        ]);

        $keluarga['atk'] = date('d M Y', strtotime($keluarga->akhir_tunj_keluarga));
        $keluarga->load('statusKeluarga');

        return response()->json($keluarga, 200);
    }
}
