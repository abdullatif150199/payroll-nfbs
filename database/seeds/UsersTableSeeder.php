<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'bio' => 'lorem ipsum dolor sit amet.',
            'remember_token' => str_random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('karyawan')->insert([
            'user_id' => 1,
            'golongan_id' => 1,
            'status_kerja_id' => 1,
            'kelompok_kerja_id' => 1,
            'no_induk' => mt_rand(100000, 300000),
            'nik' => mt_rand(1000000000000000, 3000000000000000),
            'nama_lengkap' => 'MD Akmami',
            'tempat_lahir' => 'Serang',
            'tanggal_lahir' => '1993-09-29',
            'jenis_kelamin' => 'L',
            'status_pernikahan' => 'B',
            'alamat' => 'Jl. Pengarangan',
            'no_hp' => '087809194869',
            'nama_pendidikan' => 'SMA pengarangan',
            'pendidikan_terakhir' => 'SMA',
            'jurusan' => 'IPA',
            'tahun_lulus' => '2012',
            'tanggal_masuk' => '2017-02-20',
            'nama_bank' => 'BNI',
            'no_rekening' => '1234567890',
            'rekening_atas_nama' => 'MD Akmami',
            'status' => 2,
            'tipe_kerja' => 'non shift',
            'jam_perpekan_id' => 1,
            'contract_expired' => '2021-06-20',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
