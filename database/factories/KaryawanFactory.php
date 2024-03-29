<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Karyawan::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return App\Models\User::inRandomOrder()->first()->id;
        },
        'golongan_id' => function () {
            return App\Models\Golongan::inRandomOrder()->first()->id;
        },
        'status_kerja_id' => function () {
            return App\Models\StatusKerja::inRandomOrder()->first()->id;
        },
        'kelompok_kerja_id' => function () {
            return App\Models\KelompokKerja::inRandomOrder()->first()->id;
        },
        'no_induk' => mt_rand(100000, 300000),
        'nik' => mt_rand(1000000000000000, 3000000000000000),
        'nama_lengkap' => $faker->name,
        'tempat_lahir' => $faker->city,
        'tanggal_lahir' => $faker->date(),
        'jenis_kelamin' => $faker->randomElement(['L', 'P']),
        'status_pernikahan' => $faker->randomElement(['M', 'B']),
        'alamat' => $faker->address,
        'no_hp' => $faker->phoneNumber,
        'nama_pendidikan' => $faker->company,
        'pendidikan_terakhir' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
        'jurusan' => $faker->jobTitle,
        'tahun_lulus' => $faker->year(),
        'tanggal_masuk' => $faker->date(),
        'tanggal_keluar' => $faker->date(),
        'nama_bank' => $faker->randomElement(['BNI', 'Mandiri', 'BCA', 'BRI']),
        'no_rekening' => $faker->bankAccountNumber,
        'rekening_atas_nama' => $faker->name,
        'status' => mt_rand(1,2),
        'tipe_kerja' => $faker->randomElement(['shift', 'non shift']),
        'jam_perpekan_id' => mt_rand(1,3),
    ];
});
