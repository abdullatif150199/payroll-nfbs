<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Keluarga::class, function (Faker $faker) {
    return [
        'karyawan_id' => function () {
            return App\Models\Karyawan::inRandomOrder()->first()->id;
        },
        'nama' => $faker->name,
        'status_keluarga_id' => function () {
            return App\Models\StatusKeluarga::inRandomOrder()->first()->id;
        },
        'tanggal_lahir' => $faker->date(),
        'tunjangan_pendidikan' => $faker->randomElement([100000, 200000]),
        'akhir_tunj_pendidikan' => date('Y-m-d H:i:s', strtotime('+'.mt_rand(10, 30).'days')),
        'akhir_tunj_keluarga' => date('Y-m-d H:i:s', strtotime('+'.mt_rand(10, 30).'days'))
    ];
});
