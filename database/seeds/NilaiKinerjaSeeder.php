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
                'min_persen' => 90,
                'max_persen' => 100,
                'result_persen' => 110
            ],
            [
                'nilai' => 'B',
                'min_persen' => 80,
                'max_persen' => 90,
                'result_persen' => 100
            ],
            [
                'nilai' => 'C',
                'min_persen' => 70,
                'max_persen' => 80,
                'result_persen' => 90
            ],
            [
                'nilai' => 'D',
                'min_persen' => 60,
                'max_persen' => 70,
                'result_persen' => 80
            ],
            [
                'nilai' => 'E',
                'min_persen' => 50,
                'max_persen' => 60,
                'result_persen' => 70
            ]
        ]);
    }
}
