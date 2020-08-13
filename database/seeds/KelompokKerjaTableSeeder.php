<?php

use Illuminate\Database\Seeder;

class KelompokKerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generate
        DB::table('kelompok_kerja')->insert([
            [
                'grade' => "A",
                'persen' => 0.90,
                'kinerja_normal' => 1100000
            ],
            [
                'grade' => "B",
                'persen' => 0.80,
                'kinerja_normal' => 1000000
            ],
            [
                'grade' => "C",
                'persen' => 0.70,
                'kinerja_normal' => 900000
            ],
            [
                'grade' => "D",
                'persen' => 0.60,
                'kinerja_normal' => 800000
            ],
            [
                'grade' => "E",
                'persen' => 0.50,
                'kinerja_normal' => 700000
            ]
        ]);
    }
}
