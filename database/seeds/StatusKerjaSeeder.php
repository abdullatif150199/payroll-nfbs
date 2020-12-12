<?php

use Illuminate\Database\Seeder;

class StatusKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_kerja')->insert([
            [
                'nama_status_kerja' => 'GTY',
                'persentase_gaji_pokok' => 1.00,
                'maks_jam_lembur_day' => 0,
                'maks_jam_lembur_week' => 0
            ],
            [
                'nama_status_kerja' => 'GTTY',
                'persentase_gaji_pokok' => 0.80,
                'maks_jam_lembur_day' => 0,
                'maks_jam_lembur_week' => 0
            ],
            [
                'nama_status_kerja' => 'PTY',
                'persentase_gaji_pokok' => 1.00,
                'maks_jam_lembur_day' => 2,
                'maks_jam_lembur_week' => 4
            ],
            [
                'nama_status_kerja' => 'PTTY',
                'persentase_gaji_pokok' => 0.80,
                'maks_jam_lembur_day' => 2,
                'maks_jam_lembur_week' => 4
            ],
            [
                'nama_status_kerja' => 'Harian',
                'persentase_gaji_pokok' => 1.00,
                'maks_jam_lembur_day' => 2,
                'maks_jam_lembur_week' => 4
            ],
        ]);
    }
}
