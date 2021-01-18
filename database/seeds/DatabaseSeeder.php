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
        $this->call(GolonganSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(JamPerpekanTableSeeder::class);
        $this->call(KelompokKerjaTableSeeder::class);
        $this->call(NilaiKinerjaSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PersentaseKinerjaTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(StatusKeluargaTableSeeder::class);
        $this->call(StatusKerjaSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
