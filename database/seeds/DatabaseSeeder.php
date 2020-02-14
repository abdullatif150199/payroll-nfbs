<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(KelompokKerjaTableSeeder::class);
        $this->call(StatusKeluargaTableSeeder::class);
        $this->call(NilaiKinerjaSeeder::class);
        $this->call(PersentaseKinerjaTableSeeder::class);
        $this->call(MasterSeeder::class);
        // $this->call(JabatanGolonganSeeder::class);
        // $this->call(BidangUnitKaryawanSeeder::class);
        // $this->call(OtherSeeder::class);
    }
}
