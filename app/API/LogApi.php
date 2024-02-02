<?php

namespace App\API;

use App\Helpers\profile;
use Illuminate\Support\Facades\Http;

class LogApi
{
    public static function getLog()
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/log')->json()['data'];
    }
}
