<?php

namespace App\Http\Controllers;

use App\API\LogApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogActivityController extends Controller
{
    function index()
    {
        $log = LogApi::getLog()['data'];
        return view('log_activity.index', compact('log'));
    }
}
