<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'daftar pegawai',
                'guard_name' => 'web',
            ],
            [
                'name' => 'tambah pegawai',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit pegawai',
                'guard_name' => 'web',
            ],
            [
                'name' => 'resign pegawai',
                'guard_name' => 'web',
            ],
            [
                'name' => 'setting',
                'guard_name' => 'web',
            ],
            [
                'name' => 'daftar kinerja',
                'guard_name' => 'web',
            ],
            [
                'name' => 'tambah kinerja',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit kinerja',
                'guard_name' => 'web',
            ],
            [
                'name' => 'daftar insentif',
                'guard_name' => 'web',
            ],
            [
                'name' => 'daftar lembur',
                'guard_name' => 'web',
            ],
            [
                'name' => 'tambah lembur',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit lembur',
                'guard_name' => 'web',
            ],
            [
                'name' => 'hapus lembur',
                'guard_name' => 'web',
            ],
            [
                'name' => 'persetujuan lembur',
                'guard_name' => 'web',
            ],
            [
                'name' => 'lihat gaji',
                'guard_name' => 'web',
            ],
            [
                'name' => 'lihat potongan',
                'guard_name' => 'web',
            ],
            [
                'name' => 'lihat kehadiran',
                'guard_name' => 'web',
            ],
        ]);
    }
}
