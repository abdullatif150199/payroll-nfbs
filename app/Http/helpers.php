<?php

function count_time($end, $start) {
    $end = empty($end) ? date('H:i:s') : $end;
    $start = empty($start) ? date('H:i:s') : $start;
    $diff = (strtotime($end) - strtotime($start));
    $total = $diff/60;
    $jam = floor($total/60);
    $menit = $total%60;
    if ($jam < 0) {
        $jam = 00;
        $menit = 00;
    }
    return sprintf("%02d jam %02d menit", $jam, $menit);
}

function total_time($masuk, $istirahat, $kembali, $pulang) {
    $istirahat = empty($istirahat) ? date('H:i:s') : $istirahat;
    $masuk = empty($masuk) ? date('H:i:s') : $masuk;

    $pulang = empty($pulang) ? date('H:i:s') : $pulang;
    $kembali = empty($kembali) ? date('H:i:s') : $kembali;

    $diff1 = (strtotime($istirahat) - strtotime($masuk));
    $diff2 = (strtotime($pulang) - strtotime($kembali));

    $diff = $diff1 + $diff2;
    $total = $diff/60;
    $jam = floor($total/60);
    $menit = $total%60;
    if ($jam < 0) {
        $jam = 00;
        $menit = 00;
    }

    return sprintf("%02d jam %02d menit", $jam, $menit);
}

function percent_time($end, $start) {
    $end = empty($end) ? date('H:i:s') : $end;
    $start = empty($start) ? date('H:i:s') : $start;
    $total = (strtotime($end) - strtotime($start));
    $now = (strtotime(date('Y-m-d')) - strtotime($start));

    $percent = number_format($now / $total * 100);

    if ($percent > 100) {
        $percent = 100;
    }

    return $percent;
}

function percent($part, $total) {
    if ($total === 0) {
        return 'Error';
    }

    $percent = $part / $total * 100;

    return $percent;
}

function sumType($sum, $type) {
    if ($type === 'decimal') {
        return number_format($sum);
    } else {
        $ex = explode('*&', $sum);
        return $ex[0]*100 . '% ' . $ex[1];
    }
}
