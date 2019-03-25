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
        factory(App\Golongan::class, 10)->create();

        factory(App\Bidang::class, 5)->create()->each(function ($bidang) {
            $bidang->unit()->save(factory(App\Unit::class)->make());
        });

        factory(App\Karyawan::class, 50)->create()->each(function ($karyawan) {
            $karyawan->kehadiran()->save(factory(App\Kehadiran::class)->make());
            $karyawan->cuti()->save(factory(App\Cuti::class)->make());
            $karyawan->potongan()->save(factory(App\Potongan::class)->make());
            $karyawan->gaji()->save(factory(App\Gaji::class)->make());
            $karyawan->insentif()->save(factory(App\Insentif::class)->make());
            $karyawan->keluarga()->save(factory(App\Keluarga::class)->make());
            $karyawan->potongan()->save(factory(App\Potongan::class)->make());
            $karyawan->lembur()->save(factory(App\Lembur::class)->make());
            $karyawan->bidang()->attach(App\Bidang::inRandomOrder()->first()->id);
            $karyawan->unit()->attach([App\Unit::inRandomOrder()->first()->id, App\Unit::inRandomOrder()->first()->id]);
        });
    }
}
