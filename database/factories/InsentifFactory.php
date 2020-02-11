<?php

use Faker\Generator as Faker;

$factory->define(App\Insentif::class, function (Faker $faker) {
    return [
        // 'karyawan_id' => function () {
        //     return App\Karyawan::inRandomorder()->first()->id;
        // },
        'jenis_insentif' => $faker->randomElement(['SMA', 'SMP', 'HRD', 'PSB']),
        'bulan' => $faker->month(),
        'jumlah' => mt_rand(100000, 500000),
        'keterangan' => $faker->sentence(3),
    ];
});
