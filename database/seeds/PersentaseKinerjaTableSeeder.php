<?php

use Illuminate\Database\Seeder;

class PersentaseKinerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = DB::table('persentase_kinerja')->insert([
            [
                'title' => 'Produktifitas',
                'persen' => 0.35
            ],
            [
                'title' => 'Kehadiran',
                'persen' => 0.25
            ],
            [
                'title' => 'Kepesantrenan',
                'persen' => 0.25
            ],
            [
                'title' => 'Pembinaan',
                'persen' => 0.15
            ]
        ]);

        App\Models\Karyawan::All()->each(function ($kar) use ($data){
            $kar->persentaseKinerja()->attach(
                [1,2,3,4]
            );
        });
    }
}
