<?php

use Illuminate\Database\Seeder;

class BidangUnitKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bidang = factory(App\Bidang::class, 5)->create();

        $bidang->each(function ($bid) {
            $units = factory(App\Unit::class, 2)->create(['bidang_id' => $bid->id]);
            $units->each(function ($unit) {
                factory(App\Karyawan::class, 10)->create(['bidang_id' => $unit->bidang_id,
                'unit_id' => $unit->id]);
            });
        });
    }
}
