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
                'min_range' => 90,
                'max_range' => 100,
                'result_persen' => 110
            ],
            [
                'nilai' => 'B',
                'min_range' => 80,
                'max_range' => 90,
                'result_persen' => 100
            ],
            [
                'nilai' => 'C',
                'min_range' => 70,
                'max_range' => 80,
                'result_persen' => 90
            ],
            [
                'nilai' => 'D',
                'min_range' => 60,
                'max_range' => 70,
                'result_persen' => 80
            ],
            [
                'nilai' => 'E',
                'min_range' => 50,
                'max_range' => 60,
                'result_persen' => 70
            ]
        ]);
    }
}
