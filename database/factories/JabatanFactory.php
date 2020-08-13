<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Jabatan::class, function (Faker $faker) {
    return [
        'nama_jabatan' => $faker->jobTitle,
        'tunjangan_jabatan' => mt_rand(100000, 500000),
        'load' => mt_rand(5, 100),
        'maksimal_jam' => 2,
        'no_kode' => mt_rand(1,5)
    ];
});
