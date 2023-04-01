<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Models\Mutabaah;
use Carbon\Carbon;

class MutabaahController extends ProfileController
{
    public function index()
    {
        $count = Mutabaah::with('karyawan')
            ->where('karyawan_id', $this->getId())
            ->whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        $data = Mutabaah::with('karyawan')
            ->where('karyawan_id', $this->getId())
            ->latest('tanggal')
            ->simplePaginate(10);

        return view('profile.mutabaah.index', [
            'data' => $data,
            'count' => $count
        ]);
    }

    public function create()
    {
        return view('profile.mutabaah.create');
    }

    public function store(Request $request)
    {
        $request->merge(['karyawan_id' => $this->getId()]);

        $rekap = Mutabaah::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal', $request->tanggal)
            ->first();

        if ($rekap) return redirect()->route('profile.mutabaah.index')
            ->with('error', 'Mutabaah sudah terisi.');

        $dateTime = strtotime($request->tanggal);
        if ($dateTime > strtotime("now")) return redirect()->route('profile.mutabaah.index')
            ->with('error', 'Silakan isi besok ya.');

        if ($dateTime < strtotime("last Sunday")) return redirect()->route('profile.mutabaah.index')
            ->with('error', 'Pengisian tanggal ini sudah lewat.');

        if (date('l', $dateTime) == "Sunday") return redirect()->route('profile.mutabaah.index')
            ->with('error', 'Hari Ahad tidak perlu isi.');

        // if (date('l') == "Sunday") {
        //     if ($dateTime < strtotime('now')) return redirect()->route('profile.mutabaah.index')
        //         ->with('error', 'Pengisian tanggal ini sudah lewat.');
        // }

        Mutabaah::create($request->all());

        return redirect()->route('profile.mutabaah.index')
            ->with('success', 'Pengisian mutabaah berhasil.');
    }

    public function edit($id)
    {
        $data = Mutabaah::findOrFail($id);
        return view('profile.mutabaah.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = Mutabaah::findOrFail($id);
        $dateTime = strtotime($data->tanggal);

        if ($dateTime < strtotime("last Sunday")) return redirect()->route('profile.mutabaah.index')
            ->with('error', 'Edit untuk tanggal ini tidak bisa.');

        $data->shubuh = $request->shubuh;
        $data->dhuha = $request->dhuha;
        $data->tilawah_quran = $request->tilawah_quran;
        $data->qiyamul_lail = $request->qiyamul_lail;
        $data->save();

        $message = "Ubah mutabaah {$request->tanggal} berhasil.";

        return redirect()->route('profile.mutabaah.index')
            ->with('success', $message);
    }
}
