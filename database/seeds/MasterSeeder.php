<?php

use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Jabatan::class, 10)->create();
        factory(App\Golongan::class, 7)->create();
        factory(App\StatusKerja::class, 6)->create();
        factory(App\Potongan::class, 6)->create();

        factory(App\Bidang::class, 5)->create()->each(function ($bidang) {
            $bidang->unit()->saveMany(factory(App\Unit::class, 2)->make());
        });

        factory(App\Karyawan::class, 50)->create()->each(function ($karyawan) {
            $karyawan->kehadiran()->saveMany(factory(App\Kehadiran::class, 3)->make());
            $karyawan->cuti()->save(factory(App\Cuti::class)->make());
            $karyawan->gaji()->save(factory(App\Gaji::class)->make());
            $karyawan->insentif()->save(factory(App\Insentif::class)->make());
            $karyawan->keluarga()->saveMany(factory(App\Keluarga::class, rand(1, 4))->make());
            $karyawan->lembur()->saveMany(factory(App\Lembur::class, rand(1, 3))->make());
        });

        $bidang = App\Bidang::all();
        $unit = App\Unit::all();
        $potongan = App\Potongan::all();

        App\Karyawan::all()->each(function ($karyawan) use ($bidang, $unit, $potongan) {
            $karyawan->bidang()->attach(
                $bidang->random(rand(1, 2))->pluck('id')->toArray()
            );
            $karyawan->unit()->attach(
                $unit->random(rand(1, 3))->pluck('id')->toArray()
            );
            $karyawan->potongan()->attach(
                $potongan->random(rand(1, 4))->pluck('id')->toArray()
            );
        });
    }
}
