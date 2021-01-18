<?php

use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alf = ['A', 'B', 'C', 'D', 'E', 'F'];
        $tarif = [0, 8000, 8500, 10000, 12000];
        $data = [];

        for ($i=1; $i < 10; $i++) {
            if ($i > 4) {
                $lembur = $tarif[4];
            } else {
                $lembur = $tarif[$i];
            }

            foreach ($alf as $a) {
                $data[] = [
                    'kode_golongan' => $i . $a,
                    'gaji_pokok' => 0,
                    'lembur' => $lembur
                ];
            }
        }

        DB::table('golongan')->insert($data);
    }
}
