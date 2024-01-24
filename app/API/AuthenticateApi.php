<?php

namespace App\API;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthenticateApi
{
    public static function login($data, $browser)
    {
        try {
            $res = Http::post(env('API_URL', 'http://localhost:8000/api') . '/login', [
                'username'          => $data['username'],
                'password'          => $data['password'],
                'remember_me'       => $data['remember_me'],
                'ip_address'        => $browser['ip_address'],
                'browser'           => $browser['browser'],
                'browser_version'   => $browser['browser_version'],
                'os'                => $browser['os'],
                'mobile'            => $browser['mobile']
            ]);
            if (!$data['remember_me'] == null) {
                cookie()->queue('token', json_decode($res, true)['data']['user']['remember_token'], 60 * 24);
            }
            Session::put('user', $res['data']);
            return $res;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
