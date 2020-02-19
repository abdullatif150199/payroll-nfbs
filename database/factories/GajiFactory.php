<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Gaji::class, function (Faker $faker) {
    return [
        // 'karyawan_id' => function() {
        //     // get random karyawan id
        //     return App\Karyawan::inRandomOrder()->first()->id;
        // },
        'bulan' => date('Y') . '-' . $faker->month(),
        'gaji_pokok' => $gaji_pokok = mt_rand(1000000, 5000000),
        'tunjangan_jabatan' => $tunjangan_jabatan = mt_rand(1000000, 5000000),
        'tunjangan_fungsional' => $tunjangan_fungsional = mt_rand(1000000, 5000000),
        'tunjangan_kinerja' => $tunjangan_kinerja = mt_rand(1000000, 5000000),
        'tunjangan_pendidikan' => $tunjangan_pendidikan = mt_rand(100000, 500000),
        'tunjangan_istri' => $tunjangan_istri = mt_rand(100000, 500000),
        'tunjangan_anak' => $tunjangan_anak = mt_rand(100000, 500000),
        'tunjangan_hari_raya' => $tunjangan_hari_raya = mt_rand(1000000, 5000000),
        'lembur' => $lembur = mt_rand(100000, 500000),
        'lain_lain' => $lain_lain = mt_rand(100000, 200000),
        'insentif' => $insentif = mt_rand(100000, 500000),
        'potongan' => $potongan = mt_rand(100000, 500000),
        'gaji_akhir' => $gaji_pokok + $tunjangan_jabatan + $tunjangan_fungsional +$tunjangan_kinerja +  $tunjangan_pendidikan + $tunjangan_istri + $tunjangan_anak + $tunjangan_hari_raya + $lembur + $lain_lain + $insentif - $potongan,
    ];
});
