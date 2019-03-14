<?php

use Faker\Generator as Faker;

$factory->define(App\Potongan::class, function (Faker $faker) {
    return [
        'karyawan_id' => function () {
            return App\Karyawan::inRandomOrder()->first()->id;
        },
        'nama_potongan' => $faker->randomElement(['wadiah', 'takaful', 'bpjs', 'cicilan', 'arisan', 'pph']),
        'jumlah_potongan' => mt_rand(10000, 200000),
    ];
});
