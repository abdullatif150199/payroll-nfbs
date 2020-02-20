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
        factory(App\Models\Jabatan::class, 10)->create();
        factory(App\Models\Golongan::class, 7)->create();
        factory(App\Models\StatusKerja::class, 6)->create();
        factory(App\Models\Potongan::class, 6)->create();

        factory(App\Models\Bidang::class, 5)->create()->each(function ($bidang) {
            $bidang->unit()->saveMany(factory(App\Models\Unit::class, 2)->make());
        });

        factory(App\Models\Karyawan::class, 50)->create()->each(function ($karyawan) {
            $karyawan->kehadirans()->saveMany(factory(App\Models\Kehadiran::class, 3)->make());
            $karyawan->cuti()->save(factory(App\Models\Cuti::class)->make());
            $karyawan->gaji()->save(factory(App\Models\Gaji::class)->make());
            $karyawan->insentif()->save(factory(App\Models\Insentif::class)->make());
            $karyawan->keluarga()->saveMany(factory(App\Models\Keluarga::class, rand(1, 4))->make());
            $karyawan->lembur()->saveMany(factory(App\Models\Lembur::class, rand(1, 3))->make());
        });

        $bidang = App\Models\Bidang::all();
        $unit = App\Models\Unit::all();
        $potongan = App\Models\Potongan::all();

        App\Models\Karyawan::all()->each(function ($karyawan) use ($bidang, $unit, $potongan) {
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
