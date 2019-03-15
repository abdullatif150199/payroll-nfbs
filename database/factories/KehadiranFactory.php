<?php

use Faker\Generator as Faker;

$factory->define(App\Kehadiran::class, function (Faker $faker) {
    return [
        'karyawan_id' => function () {
            return App\Karyawan::inRandomOrder()->first()->id;
        },
        'jam_masuk' => $faker->time(),
        'jam_istirahat' => $faker->time(),
        'jam_kembali' => $faker->time(),
        'jam_pulang' => $faker->time(),
        'tanggal' => $faker->date(),
        'jumlah_jam_ngajar' => mt_rand(4, 6),
    ];
});
