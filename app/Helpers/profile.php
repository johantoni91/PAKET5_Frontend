<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class profile
{
    public static function getUser()
    {
        return Session::get('user')['data']['user'];
    }

    public static function getToken()
    {
        return Session::get('user')['data']['token']['token'];
    }
}
