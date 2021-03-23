<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\EasyLink;
use App\Models\NilaiKinerja;
use App\Models\Karyawan;
use App\Models\Device;
use App\Models\Gaji;
use App\Models\Jabatan;

class TestCommand extends Command
{
    public $bln = '2021-02';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testing:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $jab = Jabatan::pluck('id', 'nama_jabatan')->toArray();
        dd($jab);
        $data = NilaiKinerja::all();
        $karyawan = Karyawan::find(1);
        $gaji = Gaji::with('taxHistory')->find(1);
        $tax = $karyawan->tax;
        $thr = 0; //$karyawan->tunj_hari_raya

        $gatot = array_sum([
            $karyawan->gaji_pokok,
            $karyawan->tunj_jabatan,
            $karyawan->tunj_struktural,
            $karyawan->tunj_fungsional,
            $karyawan->tunjKinerja($data, $this->bln),
            $karyawan->tunj_pendidikan_anak,
            $karyawan->tunj_istri,
            $karyawan->tunj_anak,
            $karyawan->lembur()->sumLembur($this->bln),
            $karyawan->insentif()->bulan($this->bln)->sum('jumlah')
        ]);

        $gaji_pertahun = $gatot * 12;
        $penghasilan_bruto = $gaji_pertahun + $thr;
        $biaya_jabatan = $tax->persentase_biaya_jabatan * $penghasilan_bruto;
        $penghasilan_neto = $penghasilan_bruto - $biaya_jabatan;
        $ptkp_pertahun = $tax->ptkp_pertahun;
        $pkp_pertahun = $penghasilan_neto > $ptkp_pertahun ? $penghasilan_neto - $ptkp_pertahun : 0;
        $pph21_pertahun = $tax->persentase_pph21 * $pkp_pertahun;
        $pph21_perbulan = $pph21_pertahun / 12;

        $gaji = $karyawan->gaji()->updateOrCreate([
            'bulan' => $this->bln,
        ], [
            'gaji_pokok' => $karyawan->gaji_pokok,
            'tunjangan_jabatan' => $karyawan->tunj_jabatan,
            'tunjangan_struktural' => $karyawan->tunj_struktural,
            'tunjangan_fungsional' => $karyawan->tunj_fungsional,
            'tunjangan_kinerja' => $karyawan->tunjKinerja($data, $this->bln),
            'tunj_pendidikan' => $karyawan->tunj_pendidikan_anak,
            'tunjangan_istri' => $karyawan->tunj_istri,
            'tunjangan_anak' => $karyawan->tunj_anak,
            'tunjangan_hari_raya' => $thr,
            'lembur' => $karyawan->lembur()->sumLembur($this->bln),
            // 'lain_lain' => 0,
            'insentif' => $karyawan->insentif()->bulan($this->bln)->sum('jumlah'),
            'gaji_total' => $gatot
        ]);

        // update atau create tax history
        $gaji->taxHistory()->updateOrCreate([
            'id' => $gaji->taxHistory->id
        ], [
            'gaji_perbulan' => $gatot,
            'gaji_pertahun' => $gaji_pertahun,
            'thr' => $thr,
            'penghasilan_bruto' => $penghasilan_bruto,
            'biaya_jabatan' => $biaya_jabatan,
            'penghasilan_neto' => $penghasilan_neto,
            'ptkp_pertahun' => $ptkp_pertahun,
            'pkp_pertahun' => $pkp_pertahun,
            'pph21_pertahun' => $pph21_pertahun,
            'pph21_perbulan' => $pph21_perbulan
        ]);

        // hapus semua history potongan sebelum di update
        if ($gaji->historyPotongan->count() > 0) {
            $gaji->deleteHistoryPotongan();
        }

        $pot = $gaji->historyPotongan()->createMany($karyawan->potongan_array);
        $gaji->update([
            'gaji_total' => $gatot - $pot->sum('jumlah')
        ]);
    }

    public function fingerTest()
    {
        $finger = new EasyLink;
        $device = Device::find(1);

        $serial = $device->serial_number;
        $port = $device->server_port;
        $ip = $device->server_ip;
        $scanlogs = $finger->newScan($serial, $port, $ip);

        // kalo True
        if ($scanlogs->Result) {
            foreach ($scanlogs->Data as $scan) {
                dd($scan);
                $karyawan = Karyawan::where('pin', $scan->PIN)->first();
                $karyawan->kehadiran()->create([
                        'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate)),
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ]);
            }
        }

        return $this->info('finish');
    }

    public function testGaji()
    {
        $data = NilaiKinerja::all();
        $karyawan = Karyawan::find(1);
        $gaji = Gaji::find(7);

        $gaji->deleteHistoryPotongan();

        $pot = $gaji->historyPotongan()->createMany($karyawan->potongan_array);

        dd($pot->sum('jumlah'));

        $this->info($karyawan->nama_lengkap);
        $this->info('gaji_pokok: ' . $karyawan->gaji_pokok);
        $this->info('tunjangan_jabatan: ' . $karyawan->tunj_jabatan);
        $this->info('tunjangan_struktural: ' . $karyawan->tunj_struktural);
        $this->info('tunjangan_fungsional: ' . $karyawan->tunj_fungsional);
        $this->info('tunjangan_kinerja: ' . $karyawan->tunjKinerja($data, $this->bln));
        $this->info('tunj_pendidikan: ' . $karyawan->tunj_pendidikan_anak);
        $this->info('tunjangan_istri: ' . $karyawan->tunj_istri);
        $this->info('tunjangan_anak: ' . $karyawan->tunj_anak);
        // 'tunjangan_hari_raya' => $karyawan->tunj_hari_raya,
        $this->info('lembur: ' . $karyawan->lembur()->sumLembur($this->bln));
        // 'lain_lain' => 0,
        $this->info('insentif: ' . $karyawan->insentif()->bulan($this->bln)->sum('jumlah'));
    }
}
