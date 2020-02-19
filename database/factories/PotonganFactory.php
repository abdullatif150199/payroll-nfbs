<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Potongan::class, function (Faker $faker) {
    return [
        'nama_potongan' => $faker->unique()->randomElement(['wadiah', 'takaful', 'bpjs', 'cicilan', 'arisan', 'pph']),
        'jumlah_potongan' => mt_rand(10000, 200000),
        'type' => $faker->randomElement(['percent', 'decimal']),
    ];
});
