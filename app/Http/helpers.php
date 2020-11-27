<?php

function count_time($end, $start)
{
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

function sum_time($masuk, $istirahat, $kembali, $pulang, $res=null)
{
    if (!empty($masuk) && !empty($istirahat) && !empty($kembali) && !empty($pulang)) {
        $diff1 = (strtotime($istirahat) - strtotime($masuk));
        $diff2 = (strtotime($pulang) - strtotime($kembali));

        $diff = $diff1 + $diff2;

        if ($res === 'val') {
            return $diff;
        } else {
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
}

function sum_time_shift($masuk, $pulang, $res=null)
{
    if (!empty($masuk) && !empty($pulang)) {
        $diff = (strtotime($pulang) - strtotime($masuk));

        if ($res === 'val') {
            return $diff;
        } else {
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
}

function total_sum_time($data, $tipe_kerja, $res=null)
{
    $diff = 0;
    if ($tipe_kerja === 'shift') {
        foreach ($data as $item) {
            $diff += sum_time_shift($item->jam_masuk, $item->jam_pulang, 'val');
        }
    } else {
        foreach ($data as $item) {
            $diff += sum_time($item->jam_masuk, $item->jam_istirahat, $item->jam_kembali, $item->jam_pulang, 'val');
        }
    }

    if ($res === 'val') {
        return $diff;
    } else {
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
function percent_time($end, $start)
{
    $end = empty($end) ? date('H:i:s') : $end;
    $start = empty($start) ? date('H:i:s') : $start;
    $total = (strtotime($end) - strtotime($start));
    $now = (strtotime(date('Y-m-d')) - strtotime($start));

    $percent = number_format($now / $total * 100);

    if ($percent > 100) {
        $percent = 100;
    } elseif ($percent < 0) {
        $percent = 0;
    }

    return $percent;
}

// remaining days
function days_diff($end, $start)
{
    if (strtotime(date('Y-m-d')) < strtotime($start)) {
        return (new DateTime($end))->diff(new DateTime($start))->days;
    } elseif (strtotime(date('Y-m-d')) > strtotime($end)) {
        return 0;
    }

    return (new DateTime($end))->diff(new DateTime(date('Y-m-d')))->days;
}

function percent($part, $total)
{
    if ($total === 0) {
        return 'Error';
    }

    $percent = $part / $total * 100;

    return $percent;
}

function to_percent($val)
{
    return $val * 100 . '%';
}

function sumType($sum, $type)
{
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

function yearMonth($value, $hidden = null)
{
    // From DB yyyy-mm-dd
    $str = explode('-', $value);
    $thn = $str[0];
    $bln = $str[1];
    $hr = $str[2] ?? null;

    switch ($bln) {
        case '01':
            $bln = 'Januari';
            break;
        case '02':
            $bln = 'Februari';
            break;
        case '03':
            $bln = 'Maret';
            break;
        case '04':
            $bln = 'April';
            break;
        case '05':
            $bln = 'Mei';
            break;
        case '06':
            $bln = 'Juni';
            break;
        case '07':
            $bln = 'Juli';
            break;
        case '08':
            $bln = 'Agustus';
            break;
        case '09':
            $bln = 'September';
            break;
        case '10':
            $bln = 'Oktober';
            break;
        case '11':
            $bln = 'November';
            break;
        case '12':
            $bln = 'Desember';
            break;
    }

    switch ($hidden) {
        case 'H':
            $result = $bln . ' ' . $thn;
            break;

        case 'Y':
            $result = $hr . ' ' . $bln;
            break;

        default:
            $result = $hr . ' ' . $bln . ' ' . $thn;
            break;
    }

    return $result;
}

// Get Setting Variable from DB
function setting($key)
{
    static $setting;

    if (is_null($setting)) {
        $setting = Cache::remember('setting', 24*60, function () {
            return array_pluck(App\Models\Setting::all()->toArray(), 'value', 'key');
        });
    }

    return (is_array($key)) ? array_only($setting, $key) : $setting[$key];
}
