<?php

use Faker\Generator as Faker;

$factory->define(App\Unit::class, function (Faker $faker) {
    return [
        // 'bidang_id' => function () {
        //     return  App\Bidang::inRandomOrder()->first()->id;
        // },
        'nama_unit' => $faker->word,
    ];
});
