<?php

use Illuminate\Database\Seeder;

class StatusKeluargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generate
        DB::table('status_keluarga')->insert([
            [
                'id' => 1,
                'status' => "suami",
                'persen' => 0
            ],
            [
                'id' => 2,
                'status' => "istri",
                'persen' => 0.15
            ],
            [
                'id' => 3,
                'status' => "anak",
                'persen' => 0.05
            ]
        ]);
    }
}
