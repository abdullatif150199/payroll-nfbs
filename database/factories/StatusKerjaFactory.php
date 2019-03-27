<?php

use Faker\Generator as Faker;

$factory->define(App\StatusKerja::class, function (Faker $faker) {
    return [
        'nama_status_kerja' => $faker->unique()->randomElement(['GTY', 'GTTY', 'PTY', 'PTTY', 'HARIAN', 'HONORER']),
        'persentase_gaji_pokok' => rand(1, 100) / 100,
    ];
});
