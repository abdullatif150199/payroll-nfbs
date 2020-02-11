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
                'status' => "suami",
                'persen' => 0
            ],
            [
                'status' => "istri",
                'persen' => 0.15
            ],
            [
                'status' => "anak",
                'persen' => 0.05
            ]
        ]);
    }
}
