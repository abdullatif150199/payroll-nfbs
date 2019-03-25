<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'bidang_id' => function () {
            return App\Bidang::inRandomOrder()->first()->id;
        },
        'karyawan_id' => function () {
            return App\Karyawan::inRandomOrder()->first()->id;
        }
    ];
});
