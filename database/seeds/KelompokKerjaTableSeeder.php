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
                'persen' => 0.90
            ],
            [
                'grade' => "B",
                'persen' => 0.80
            ],
            [
                'grade' => "C",
                'persen' => 0.70
            ],
            [
                'grade' => "D",
                'persen' => 0.60
            ],
            [
                'grade' => "C",
                'persen' => 0.50
            ]
        ]);
    }
}
