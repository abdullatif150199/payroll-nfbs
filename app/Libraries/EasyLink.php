<?php

namespace App\Libraries;

class EasyLink
{
    public $ip;
    public $port;

    public function __construct()
    {
        $this->ip = setting('fingerprint_server_ip');
        $this->port = setting('fingerprint_server_port');
    }

    /**
     * untuk melakukan koneksi yang menghubungkan antara software dengan mesin fingerspot
     */
    private function webservice($port, $url, $parameter)
    {
        $curl = curl_init();
        set_time_limit(0);
        curl_setopt_array(
            $curl,
            array(
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

    public function info($serial)
    {
        $url = $this->ip . '/dev/info';
        $parameter = 'sn=' . $serial;
        $data = $this->webservice($this->port, $url, $parameter);

        return json_decode($data);
    }

    public function allScan($serial, $limit = 100)
    {
        $url = $this->ip . '/scanlog/all/paging';
        $parameter = 'sn=' . $serial . "&limit=" . $limit;
        $data = $this->webservice($this->port, $url, $parameter);

        return json_decode($data);
    }

    public function newScan($serial)
    {
        $url = $this->ip . '/scanlog/new';
        $parameter = 'sn=' . $serial;
        $data = $this->webservice($this->port, $url, $parameter);

        return json_decode($data);
    }

    public function delScan($serial)
    {
        $url = $this->ip . '/scanlog/del';
        $parameter = 'sn=' . $serial;
        $data = $this->webservice($this->port, $url, $parameter);

        return json_decode($data);
    }

    public function upload($arr)
    {
        $url = $this->ip . '/user/set';
        $parameter = 'sn=' . $arr['serial']
            . "&pin=" . $arr['pin']
            . "&nama=" . $arr['nama']
            . "&pwd=" . $arr['pwd']
            . "&rfid=" . $arr['rfid']
            . "&priv=" . $arr['priv']
            . "&tmp=" . $arr['tmp'];
        $data = $this->webservice($this->port, $url, $parameter);

        return json_decode($data);
    }
}
