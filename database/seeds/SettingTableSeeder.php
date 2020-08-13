<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' => 'jml_hari_per_pekan',
                'value' => 6,
            ],
            [
                'key' => 'maks_tunjangan_anak',
                'value' => 3,
            ],
            [
                'key' => 'maks_tunjangan_pendidikan_anak',
                'value' => 3,
            ],
            [
                'key' => 'maks_tunjangan_istri',
                'value' => 1,
            ],
            [
                'key' => 'kehadiran_start',
                'value' => 15,
            ],
            [
                'key' => 'kehadiran_end',
                'value' => 15,
            ],
            [
                'key' => 'tarif_load',
                'value' => 20000,
            ]
        ]);
    }
}
