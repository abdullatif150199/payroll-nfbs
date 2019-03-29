<?php

use Faker\Generator as Faker;

$factory->define(App\Golongan::class, function (Faker $faker) {
    return [
        'kode_golongan' => $faker->unique()->randomElement(['2A', '2B', '2C', '3A', '3B', '4A', '5A']),
        'gaji_pokok' => mt_rand(1000000, 6000000),
        'lembur' => 500000,
    ];
});
