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
                'min_persen' => 0.9,
                'max_persen' => 1,
                'result_persen' => 1.1
            ],
            [
                'nilai' => 'B',
                'min_persen' => 0.8,
                'max_persen' => 0.9,
                'result_persen' => 1
            ],
            [
                'nilai' => 'C',
                'min_persen' => 0.7,
                'max_persen' => 0.8,
                'result_persen' => 0.9
            ],
            [
                'nilai' => 'D',
                'min_persen' => 0.6,
                'max_persen' => 0.7,
                'result_persen' => 0.8
            ],
            [
                'nilai' => 'E',
                'min_persen' => 0.5,
                'max_persen' => 0.6,
                'result_persen' => 0.7
            ]
        ]);
    }
}
