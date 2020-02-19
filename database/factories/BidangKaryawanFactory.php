<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'bidang_id' => function () {
            return App\Models\Bidang::inRandomOrder()->first()->id;
        },
        'karyawan_id' => function () {
            return App\Models\Karyawan::inRandomOrder()->first()->id;
        }
    ];
});
