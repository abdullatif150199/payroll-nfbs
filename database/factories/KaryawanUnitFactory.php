<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'karyawan_id' => function () {
            return App\Karyawan::inRandomOrder()->first()->id;
        },
        'unit_id' => function () {
            return App\Unit::inRandomOrder()->first()->id;
        }
    ];
});
