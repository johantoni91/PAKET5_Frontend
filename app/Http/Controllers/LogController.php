<?php

namespace App\Http\Controllers;

use App\Helpers\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class LogController extends Controller
{
    function index()
    {
        $data = 'Log Aktivitas';
        $res = Http::withToken(profile::getToken())->get(env('API_URL', '') . '/log')->json()['data'];
        return view('log_activity.index', ['title' => $data,  'data' => $res]);
    }
}
