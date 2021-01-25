<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluarga;

class KeluargaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:150',
            'tanggal_lahir' => 'required'
        ]);

        $keluarga = Keluarga::create([
            'karyawan_id' => $request->karyawan_id,
            'nama' => $request->nama,
            'status_keluarga_id' => $request->status_keluarga_id,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tunjangan_pendidikan' => $request->tunjangan_pendidikan,
            'akhir_tunj_penidikan' => $request->akhir_tunj_pendidikan,
            'akhir_tunj_keluarga' => $request->akhir_tunj_pendidikan,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Keluarga berhasil ditambahkan'
        ]);
    }
}
