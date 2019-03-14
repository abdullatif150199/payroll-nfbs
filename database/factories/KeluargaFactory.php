<?php

use Faker\Generator as Faker;

$factory->define(App\Keluarga::class, function (Faker $faker) {
    return [
        'karyawan_id' => function () {
            return App\Karyawan::inRandomOrder()->first()->id;
        },
        'nama' => $faker->name,
        'status_keluarga' => $faker->randomElement(['istri', 'anak']),
        'tanggal_lahir' => $faker->date(),
        'jumlah_tunjangan' => $faker->randomElement([100000, 200000]),
    ];
});
