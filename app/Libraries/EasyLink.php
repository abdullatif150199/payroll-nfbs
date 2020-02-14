<?php

namespace App\Libraries;

class EasyLink
{
    /** =================================================================================
     * untuk melakukan koneksi yang menghubungkan antara software dengan mesin fingerspot
     * ================================================================================ */
    private function webservice($port, $url, $parameter)
    {
        $curl = curl_init();
        set_time_limit(0);
        curl_setopt_array($curl, array(
                CURLOPT_PORT => $port,
                CURLOPT_URL => "http://" . $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $parameter,
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: application/x-www-form-urlencoded"
                ),
            )
        );
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $response = ("Error #:" . $err);
        } else {
            $response;
        }
        return $response;
    }

    public function info($serial, $port, $ip)
    {
        $url = $ip . '/dev/info';
        $parameter = 'sn=' . $serial;
        $data = $this->webservice($port, $url, $parameter);

        return json_decode($data);
    }

    public function allScan($serial, $port, $ip, $limit=100)
    {
        $url = $ip . '/scanlog/all/paging';
        $parameter = 'sn=' . $serial . "&limit=" . $limit;
        $data = $this->webservice($port, $url, $parameter);

        return json_decode($data);
    }

    public function newScan($serial, $port, $ip)
    {
        $url = $ip . '/scanlog/new';
        $parameter = 'sn=' . $serial;
        $data = $this->webservice($port, $url, $parameter);

        return json_decode($data);
    }

    public function delScan($serial, $port, $ip)
    {
        $url = $ip . '/scanlog/del';
        $parameter = 'sn=' . $serial;
        $data = $this->webservice($port, $url, $parameter);

        return json_decode($data);
    }
}
