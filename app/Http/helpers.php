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
    if (!empty($masuk) && !empty($istirahat) && !empty($kembali) && !empty($pulang)) {
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

}

// days percent used
function percent_time($end, $start) {
    $end = empty($end) ? date('H:i:s') : $end;
    $start = empty($start) ? date('H:i:s') : $start;
    $total = (strtotime($end) - strtotime($start));
    $now = (strtotime(date('Y-m-d')) - strtotime($start));

    $percent = number_format($now / $total * 100);

    if ($percent > 100) {
        $percent = 100;
    } elseif($percent < 0) {
        $percent = 0;
    }

    return $percent;
}

// remaining days
function days_diff($end, $start) {
    if (strtotime(date('Y-m-d')) < strtotime($start)) {
        return (new DateTime($end))->diff(new DateTime($start))->days;
    } elseif (strtotime(date('Y-m-d')) > strtotime($end)) {
        return 0;
    }

    return (new DateTime($end))->diff(new DateTime(date('Y-m-d')))->days;
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

// for Route name
function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}

// for path URI
function setActive($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            return Request::path() === $u ? $output : "";
        }
    } else {
        return Request::path() === $uri ? $output : "";
    }
}
