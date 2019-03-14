<?php

use Faker\Generator as Faker;

$factory->define(App\Lembur::class, function (Faker $faker) {
    return [
        'karyawan_id' => function () {
            return App\Karyawan::inRandomOrder()->first()->id;
        },
        'bulan' => $faker->month(),
        'jumlah_jam_lembur' => mt_rand(2, 4),
        'keterangan' => $faker->sentence(3),
    ];
});
