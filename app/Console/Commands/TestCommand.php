<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\EasyLink;
use App\Models\NilaiKinerja;
use App\Models\Karyawan;
use App\Models\Device;
use App\Models\Gaji;

class TestCommand extends Command
{
    public $bln = '2020-12';
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
        // 'tunjangan_hari_raya' => $this->karyawan->tunj_hari_raya,
        $this->info('lembur: ' . $karyawan->lembur()->sumLembur($this->bln));
        // 'lain_lain' => 0,
        $this->info('insentif: ' . $karyawan->insentif()->bulan($this->bln)->sum('jumlah'));
    }

    public function fingerTest()
    {
        $finger = new EasyLink;
        $devices = Device::all();

        foreach ($devices as $device) {
            $serial = $device->serial_number;
            $port = $device->server_port;
            $ip = $device->server_ip;
            $scanlogs = $finger->newScan($serial, $port, $ip);

            // kalo True
            if ($scanlogs->Result) {
                foreach ($scanlogs->Data as $scan) {
                    $karyawan = Karyawan::where('pin', $scan->PIN)->first();
                    $karyawan->kehadiranHariIni()->update([
                        'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);
                }
            }
        }

        return $this->info('finish');
    }
}
