<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Bidang::class, function (Faker $faker) {
    return [
        'nama_bidang' => $faker->sentence(1),
    ];
});
