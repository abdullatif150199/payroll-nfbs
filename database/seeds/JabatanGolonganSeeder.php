<?php

use Illuminate\Database\Seeder;

class JabatanGolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Jabatan::class, 10)->create();
        factory(App\Golongan::class, 5)->create();
    }
}
