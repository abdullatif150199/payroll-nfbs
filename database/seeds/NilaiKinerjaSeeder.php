<?php

use Illuminate\Database\Seeder;

class NilaiKinerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nilai_kinerja')->insert([
            [
                'nilai' => 'A',
                'min_nilai' => 90,
                'result_persen' => 1.1
            ],
            [
                'nilai' => 'B',
                'min_nilai' => 80,
                'result_persen' => 1
            ],
            [
                'nilai' => 'C',
                'min_nilai' => 70,
                'result_persen' => 0.9
            ],
            [
                'nilai' => 'D',
                'min_nilai' => 60,
                'result_persen' => 0.8
            ],
            [
                'nilai' => 'E',
                'min_nilai' => 50,
                'result_persen' => 0.7
            ]
        ]);
    }
}
