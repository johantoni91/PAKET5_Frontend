<?php

namespace App\API;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LogApi
{
    private static $path = '/log';
    public static function getLog()
    {
        $res = Http::withToken(Session::get('user')['token']['token'])->get(env('API_URL', 'http://localhost:8000/api') . self::$path);
        if ($res->successful()) {
            return $res->json();
        }
        return $res->failed();
    }
}
