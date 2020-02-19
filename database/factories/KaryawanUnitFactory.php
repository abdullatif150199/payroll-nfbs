<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'karyawan_id' => function () {
            return App\Models\Karyawan::inRandomOrder()->first()->id;
        },
        'unit_id' => function () {
            return App\Models\Unit::inRandomOrder()->first()->id;
        }
    ];
});
