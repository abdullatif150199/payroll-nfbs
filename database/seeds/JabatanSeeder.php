<?php

use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            [
                'nama_jabatan' => 'Guru',
                'tunjangan_jabatan' => 0,
                'load' => 0
            ],
            [
                'nama_jabatan' => 'Kepal Sekolah',
                'tunjangan_jabatan' => 0,
                'load' => 65
            ],
            [
                'nama_jabatan' => 'Kepala Bidang Pendidikan',
                'tunjangan_jabatan' => 0,
                'load' => 65
            ],
            [
                'nama_jabatan' => 'Kepala Unit',
                'tunjangan_jabatan' => 0,
                'load' => 50
            ],
            [
                'nama_jabatan' => 'Kepala Bidang',
                'tunjangan_jabatan' => 0,
                'load' => 50
            ],
            [
                'nama_jabatan' => 'Wakil Kepala Bidang',
                'tunjangan_jabatan' => 0,
                'load' => 20
            ],
            [
                'nama_jabatan' => 'PJ',
                'tunjangan_jabatan' => 0,
                'load' => 15
            ],
            [
                'nama_jabatan' => 'Pembina Organisasi',
                'tunjangan_jabatan' => 0,
                'load' => 15
            ],
            [
                'nama_jabatan' => 'Wali Asrama',
                'tunjangan_jabatan' => 0,
                'load' => 30
            ],
            [
                'nama_jabatan' => 'Koordinator Unit',
                'tunjangan_jabatan' => 0,
                'load' => 5
            ],
        ]);
    }
}
