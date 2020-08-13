<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Lembur::class, function (Faker $faker) {
    return [
        // 'karyawan_id' => function () {
        //     return App\Karyawan::inRandomOrder()->first()->id;
        // },
        'bulan' => $faker->month(),
        'jumlah_jam_lembur' => 2,
        'keterangan' => $faker->sentence(3),
        'date' => date('Y-m-d H:i:s', strtotime('-'.mt_rand(1, 30).'days')),
        'type' => $faker->randomElement(['week', 'day', 'holi']),
        'total_tarif' => 2*20000
    ];
});
