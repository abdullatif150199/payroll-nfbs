<?php

use Illuminate\Database\Seeder;

class OtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Cuti::class, 10)->create();
        factory(App\Gaji::class, App\Karyawan::count())->create();
        factory(App\Insentif::class, App\Karyawan::count())->create();
        factory(App\Lembur::class, App\Karyawan::count())->create();
        factory(App\Potongan::class, App\Karyawan::count())->create();
        factory(App\Keluarga::class, App\Karyawan::count())->create();
        factory(App\Kehadiran::class, App\Karyawan::count())->create();
    }
}
