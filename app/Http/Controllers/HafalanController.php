<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Karyawan;
use App\Models\Hapalan;
use App\Models\Bidang;
use App\Models\Jabatan;
use App\Models\Unit;

use App\Exports\HafalanPegawaiExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class HafalanController extends Controller
{
    public function index()
    {
        $title = 'Setoran Hafalan';
        $view = 'hafalan.index';
        // $list = [null, 'persentase', 'apel', 'persentase-apel', 'jadwal-apel'];
        $bidang = Bidang::pluck('nama_bidang', 'id');
        $unit = Unit::pluck('nama_unit', 'id');
        $karyawan = Karyawan::orderBy('nama_lengkap')->pluck('nama_lengkap', 'id');

        return view($view, [
            'title' => $title,
            'bidang' => $bidang,
            'unit' => $unit,
            'karyawan' => $karyawan   
        ]);
    }



    // public function show (Karyawan $karyawan) 
    // {
    //     $hapalans = $karyawan->hapalan;
    //     $totalHalaman = 0;
    //     $lastJuz = null;
    //     $maxHalaman = 0;

    //     foreach ($hapalans as $hapalan) {
    //         $juz = $hapalan->juz;
    //         $halaman = $hapalan->sampai_halaman;
            
    //         if ($juz !== $lastJuz) {
    //             $totalHalaman += $halaman;
    //             $maxHalaman = $halaman;
    //         } else {
    //             $maxHalaman = max($maxHalaman, $halaman);
    //         }
        
    //         $totalHalaman -= $maxHalaman;
    //         $totalHalaman += $halaman;
        
    //         $lastJuz = $juz;
    //     }
    //     return dd($totalHalaman);


    //     return view('hafalan.show', [
    //         'title' => $title.$karyawan->nama_lengkap,
    //         'count' => $count
    //     ]);
    // }

    public function show (Karyawan $karyawan) 
    {
        $hapalans = $karyawan->hapalan;
        $title = 'Detail Hafalan ';
        $hafalanTerakhir = $karyawan->hapalan()->latest()->first();
        $juzTerakhir = null;
        $halamanTerakhir = null;

        $count = $karyawan->hapalan()
        ->whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();
        
        if ($hafalanTerakhir) {
            $juzTerakhir = $hafalanTerakhir->juz;
            $halamanTerakhir = $hafalanTerakhir->sampai_halaman;
        } else {
            $juzTerakhir = 0;
        }
        
        if ($juzTerakhir == 1 ) {
            $jumlahHalaman = 21;
        } elseif ($juzTerakhir >= 2 && $juzTerakhir <= 29) {
            $jumlahHalaman = 20;
        } elseif ($juzTerakhir == 30) {
            $jumlahHalaman = 24;
        } else {
            $jumlahHalaman = 0; 
        }
        $sisaHalaman = $jumlahHalaman -  $halamanTerakhir;

        return view('hafalan.show', [
            'title' => $title.$karyawan->nama_lengkap,
            'karyawan' => $karyawan,
            'hafalans' => $karyawan->hapalan()->latest()->simplePaginate(10),
            'juzTerakhir' => $juzTerakhir,
            'hafalanTerakhir'  => $hafalanTerakhir,
            'halamanTerakhir' => $halamanTerakhir,
            'sisaHalaman' => $sisaHalaman,
            'count' => $count
        ]);
    }

    public function create(Karyawan $karyawan)
    {
        $title = 'Tambah Hafalan ';
        return view('hafalan.create', [
            'title' => $title.$karyawan->nama_lengkap,
            'id' => $karyawan->id,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            'tanggal' => 'required|max:22',
            'juz' => 'required|max:22',
            'dari_halaman' => 'required|max:22',
            'sampai_halaman' => 'required|max:22',
            'surat' => 'required',
        ]);

        $validatedData['karyawan_id'] = $request->id;
        Hapalan::create($validatedData);

        return redirect('/dashboard/hafalan/'.$request->id)->with('success', 'Hafalan Berhasil Ditambahkan!');

    }


    public function edit (Hapalan $hapalan)
    {
        $title = 'Edit Hafalan ';
        return view('hafalan.edit', [
            'hapalan' => $hapalan,
            'title' => $title.$hapalan->karyawan->nama_lengkap
        ]);
    }

    public function update (Request $request, Hapalan $hapalan) 
    {
        $rules =[
            'tanggal' => 'required|max:22',
            'juz' => 'required|max:22',
            'dari_halaman' => 'required|max:22',
            'sampai_halaman' => 'required|max:22',
            'surat' => 'required',
            ];

        
        $validatedData = $request->validate($rules);
        $validatedData['karyawan_id'] = $hapalan->karyawan_id;
        Hapalan::where('id', $hapalan->id)->update($validatedData);
        return redirect('/dashboard/hafalan/'.$hapalan->karyawan_id)->with('success', 'Hapalan Berhasil Diubah!');
    } 

    public function destroy (Hapalan $hapalan) 
    {
        Hapalan::destroy($hapalan->id);
        return redirect('/dashboard/hafalan/'.$hapalan->karyawan_id)->with('success', 'Hapalan Berhasil Dihapus');
    }

    public function detail ()
    { 
        
        $title = 'Setoran Hafalan';
        $karyawans = Karyawan::query();

        if (request('search')) {
            $karyawans->where('nama_lengkap', 'like', '%' . request('search') . '%');
        }
    
        $karyawans = $karyawans->simplePaginate(10);
        $hapalans = $karyawans->pluck('hapalan');
    
        return view('hafalan.detail', [
            'title' => $title,
            'karyawans' => $karyawans,
            'hapalans' => $hapalans
        ]);
    }

    public function datatable(Request $request)
    {
        $tanggal = $request->tanggal ? $request->tanggal : date('Y-m-d');

        if ($request->unit && $request->unit != '') {
            $data = Hapalan::with('karyawan')
                ->when($request->unit, function ($query) use ($request) {
                    $query->whereHas('karyawan.unit', function ($q) use ($request) {
                        $q->where('id', $request->unit);
                    });
                })
                ->where('tanggal', $tanggal)
                ->latest();
        } else {
            $data = Hapalan::with('karyawan')
                ->when($request->bidang, function ($query) use ($request) {
                    $query->whereHas('karyawan.bidang', function ($q) use ($request) {
                        $q->where('id', $request->bidang);
                    });
                })
                ->where('tanggal', $tanggal)
                ->latest();
        }

        return Datatables::of($data)
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">' . $data->karyawan->no_induk . '</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                
                return $data->karyawan->nama_lengkap;
            })
            ->editColumn('action', function ($data) { 
                return '<a href="hafalan/' . $data->karyawan->id . '" class="bg-primary text-white p-2 rounded">Hafalan</a>';
                // <a href="Edit" class="bg-primary text-white p-1">Edit</>
            })
          
            ->rawColumns(['no_induk', 'nama_lengkap', 'action']) 
            ->make(true);       
    }

    // Download Rekap Mutabaah Pegawai - Semua atau Unit
    // public function export() 
    // {
    //     return Excel::download(new HafalanPegawaiExport, 'HafalanPegawai.xlsx');
    // }

    public function unduh (Request $request)
    {

        $from = $request->date_start ? $request->date_start : Carbon::now()->subDays(7)->format('Y-m-d');
        $to = $request->date_end ? $request->date_end : Carbon::now()->format('Y-m-d');
        
        $export = new HafalanPegawaiExport($from, $to, $request->bidang, $request->unit);
        
        return Excel::download($export, 'hafalan_' . date('d-m-Y') . '_dari_' . $request->date_start . '_sampai_' . $request->date_end . '_.xlsx');
    }

}
