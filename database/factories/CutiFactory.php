<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Cuti::class, function (Faker $faker) {
    return [
        // 'karyawan_id' => function() {
        //     // get random karyawan id
        //     return App\Karyawan::inRandomOrder()->first()->id;
        // },
        'start_at' => $faker->date(),
        'end_at' => $faker->date(),
    ];
});
