<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Jabatan::class, function (Faker $faker) {
    return [
        'nama_jabatan' => $faker->jobTitle,
        'tunjangan_jabatan' => mt_rand(100000, 500000),
        'load' => 200000,
        'maksimal_jam' => 2,
    ];
});
