<?php

use Faker\Generator as Faker;

$factory->define(App\Keluarga::class, function (Faker $faker) {
    return [
        'karyawan_id' => function () {
            return App\Karyawan::inRandomOrder()->first()->id;
        },
        'nama' => $faker->name,
        'status_keluarga_id' => function () {
            return App\StatusKeluarga::inRandomOrder()->first()->id;
        },
        'tanggal_lahir' => $faker->date(),
        'tunjangan_pendidikan' => $faker->randomElement([100000, 200000]),
    ];
});
