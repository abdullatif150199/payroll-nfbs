<?php

use Illuminate\Database\Seeder;

class JamPerpekanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jam_perpekan')->insert([
            [
                'jml_jam' => 40,
                'jml_hari' => 6,
                'keterangan' => 'Pegawai',
            ],
            [
                'jml_jam' => 30,
                'jml_hari' => 6,
                'keterangan' => 'Guru',
            ],
            [
                'jml_jam' => 42,
                'jml_hari' => 6,
                'keterangan' => 'Harian'
            ]
        ]);
    }
}
