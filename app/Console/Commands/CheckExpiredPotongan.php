<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Reminder;
use App\Models\Karyawan;
use App\Models\User;

class CheckExpiredPotongan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'potongan:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengecek potongan kadaluarsa dan mengirim notifikasi';

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
     * @return int
     */
    public function handle()
    {
        $data = [];
        $karyawan = Karyawan::with('potongan')
            ->where('status', '<>', '3')->cursor();

        foreach ($karyawan as $kar) {
            foreach ($kar->potongan as $item) {
                if (expiry_date($item->pivot->end_at)) {
                    $data['link'] = route('dash.karyawan.show', $kar->id);
                    $data['message'] = "Potongan <b>{$item->nama_potongan}</b> atas nama <b>{$kar->nama_lengkap}</b> telah berakhir";
                    $users = User::whereHas('roles', function ($query) {
                        $query->where('name', 'admin');
                    })
                    ->get();

                    Notification::send($users, new Reminder($data));
                }
            }
        }
    }
}
