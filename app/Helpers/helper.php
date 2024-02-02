<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Session;

function urlweb()
{
    //$urlweb = "http://192.168.40.2";
    $urlweb = "http://paket5.kejaksaan.info:3005";
    return $urlweb;
}

function activeRoute($route, $isClass = false): string
{
    $requestUrl = request()->fullUrl() === $route ? true : false;

    if ($isClass) {
        return $requestUrl ? $isClass : '';
    } else {
        return $requestUrl ? 'active' : '';
    }
}

date_default_timezone_set("Asia/Jakarta");

function api_pengaturan($end_point, )
{
    $api_pengaturan = urlweb() . ":3021/user/v1/" . $end_point; // 202.157.188.69:3002
    return $api_pengaturan;
}

function auth_url($end_point)
{
    $auth_url = urlweb() . "/api/" . $end_point; // 192.168.42.225
    return $auth_url;
}

function api_user($end_point)
{
    $api_user = urlweb() . ":3021/user/v1/" . $end_point; // production: 192.168.42.225
    return $api_user;
}

function api_notif($end_point)
{
    $api_notif = urlweb() . ":3022/notification/v1/" . $end_point; // production: 192.168.42.225
    return $api_notif;
}

function api_master_area($end_point)
{
    $api_master_area = urlweb() . ":3023/core/v1/master_area/" . $end_point; // production: 192.168.42.225
    return $api_master_area;
}

function api_master_area_add()
{
    $api_master_area = urlweb() . ":3023/core/v1/master_area/"; // production: 192.168.42.225
    return $api_master_area;
}

function api_master_kategori($end_point)
{
    $api_master_kategori = urlweb() . ":3023/core/v1/master_kategori/" . $end_point; // production: 192.168.42.225
    return $api_master_kategori;
}

function api_master_kategori_add()
{
    $api_master_kategori_add = urlweb() . ":3023/core/v1/master_kategori/"; // production: 192.168.42.225
    return $api_master_kategori_add;
}

function api_parkir_area($end_point)
{
    $api_parkir_area = urlweb() . ":3023/core/v1/area_parkir/" . $end_point; // production: 192.168.42.225
    return $api_parkir_area;
}

function api_parkir_area_add()
{
    $api_parkir_area_add = urlweb() . ":3023/core/v1/area_parkir"; // production: 192.168.42.225
    return $api_parkir_area_add;
}

function api_reservasi($end_point)
{
    $api_reservasi = urlweb() . ":3023/core/v1/reservasi/" . $end_point; // production: 192.168.42.225
    return $api_reservasi;
}

function api_reservasi_add()
{
    $api_reservasi_add = urlweb() . ":3023/core/v1/reservasi/"; // production: 192.168.42.225
    return $api_reservasi_add;
}

function api_newreservasi($end_point)
{
    $api_newreservasi = urlweb() . ":3023/core/v1/newreservasi/" . $end_point; // production: 192.168.42.225
    return $api_newreservasi;
}

function api_newreservasi_add()
{
    $api_newreservasi_add = urlweb() . ":3023/core/v1/newreservasi/"; // production: 192.168.42.225
    return $api_newreservasi_add;
}

function api_core($end_point)
{
    $api_core = urlweb() . ":3023/core/v1/" . $end_point; // production: 192.168.42.225
    return $api_core;
}

function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
function hari($hari)
{
    $date = date('D', strtotime($hari . "+7hours"));
    switch ($date) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }
    return $hari_ini;
}

function changeDate($tgl)
{
    $date = date('Y-m-d', strtotime($tgl));

    $ubah = gmdate($date, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tanggal = $pecah[2];
    $bulan = bulan($pecah[1]);
    $tahun = $pecah[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function changeDateTime($tgl)
{
    $date = date('Y-m-d', strtotime($tgl));
    $time = date('H:i:s', strtotime($tgl . "+7hours"));

    $ubah = gmdate($date, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tanggal = $pecah[2];
    $bulan = bulan($pecah[1]);
    $tahun = $pecah[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun . ' ' . $time;
}
function changeDateTime2($tgl)
{
    $date = date('Y-m-d', strtotime($tgl));
    $time = date('H:i:s', strtotime($tgl));

    $ubah = gmdate($date, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tanggal = $pecah[2];
    $bulan = bulan($pecah[1]);
    $tahun = $pecah[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun . ' ' . $time;
}
function changeDateTime3($tgl)
{
    $date = date('Y-m-d', strtotime($tgl . "+7hours"));
    $time = date('H:i', strtotime($tgl . "+7hours"));

    $ubah = gmdate($date, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tanggal = $pecah[2];
    $bulan = bulan($pecah[1]);
    $tahun = $pecah[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun . ' ';
}
function changeTime($tgl)
{
    $time = date('H:i:s', strtotime($tgl . "+7hours"));

    return $time;
}
function akses($segmenurl)
{
    $client = new \GuzzleHttp\Client();
    $checkToken = Session::get('token');
    $url_target_akses = api_user('akses/kewenangan');
    if ($checkToken) {
        try {
            $result_akses = $client->request('POST', $url_target_akses, [
                'form_params' => [
                    'kewenangan_id' => Session::get('kewenangan_id'),
                    'url' => $segmenurl,
                ],
                'verify' => false,
                'headers' => ['Authorization' => "Bearer {$checkToken}"],
            ]);
            $apiRes_akses = json_decode($result_akses->getBody());
            //dd($apiRes_akses);
            $data_akses = $apiRes_akses->data[0]->hak_akses[0];
            $status_c = $data_akses->status_c;
            $status_r = $data_akses->status_r;
            $status_u = $data_akses->status_u;
            $status_d = $data_akses->status_d;
            $statuscrud = [$status_c, $status_r, $status_u, $status_d];
            return $statuscrud;
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $res = $response->getBody()->getContents();
            $apiCatch = json_decode($res);
            return redirect()->back();
        }
    }
}
function doAuthHeader()
{
    $token = Session::get('token');
    return $token ? "Bearer {$token}" : "";
}

function multipartRequest($optArray = null)
{
    try {

        if (!in_array($optArray["verb"], array("POST", "GET", "PUT", "PATCH", "DELETE", "OPTION"))) {
            $errorMsg = "HTTP Verb Not Found";
            throw new Exception($errorMsg);
        }

        $token = Session::get('token');

        $reqOption = array();
        $reqOption["headers"] = array();
        $reqOption["headers"]["Authorization"] = doAuthHeader();
        $reqOption["headers"]["token"] = $token;
        $client = new Client($reqOption);

        if (isset($optArray["data"]["files"])) {
            array_push($optArray["data"]["content"], [
                "name" => "files",
                "contents" => Psr7\Utils::streamFor(Psr7\Utils::tryFopen($optArray["data"]["files"], "r")),
            ]);
        }
        $getResponse = $client->request($optArray["verb"], $optArray["url"], ["multipart" => $optArray["data"]["content"], "verify" => false]);

        $response = array();
        $response["code"] = $getResponse->getStatusCode();
        $response["phrase"] = $getResponse->getReasonPhrase();
        $response["protocolVer"] = $getResponse->getProtocolVersion();
        $response["body"] = $getResponse->getBody();

        return array(
            "success" => true,
            "content" => json_decode($response["body"], true),
        );
    } catch (GuzzleHttp\Exception\BadResponseException $expect) {
        $getResponse = $expect->getResponse();

        $response = array();
        $response["code"] = $getResponse->getStatusCode();
        $response["phrase"] = $getResponse->getReasonPhrase();
        $response["protocolVer"] = $getResponse->getProtocolVersion();
        $response["body"] = $getResponse->getBody()->getContents();

        switch ($response["code"]) {
            case $response["code"] >= 500 && $response["code"] < 600:
            case $response["code"] >= 400 && $response["code"] < 500:
                return array(
                    "success" => false,
                    "content" => $response["body"],
                );
                break;
            default:
                return array(
                    "success" => false,
                    "content" => json_decode($response["body"]),
                );
                break;
        }
    } catch (ConnectException $expect) {
        return array(
            "success" => false,
            "content" => "Lost Internet Connection",
        );
    } catch (RequestException $expect) {
        return array(
            "success" => false,
            "content" => "Bad Request",
        );
    }
}
