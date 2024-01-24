<?php

namespace App\Http\Controllers;

use App\API\AuthenticateApi;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    function login()
    {
        if (!(Session::has('user') && Cookie::has('token'))) {
            Alert::warning('warning', 'Harap login dulu!');
            return view('auth.login');
        }
        return redirect('/');
    }

    function loginProcess(AuthRequest $req)
    {
        $agent = new Agent();

        $data = [
            'username'      => $req->username,
            'password'      => $req->password,
            'remember_me'   => $req->remember_me ?? null
        ];

        $check = [
            'ip_address'        => $req->ip(),
            'browser'           => $agent->browser(),
            'browser_version'   => $agent->version($agent->platform()),
            'os'                => $agent->platform(),
            'mobile'            => $agent->isMobile() == true ? '1' : '0'
        ];

        try {
            AuthenticateApi::login($data, $check);
            return redirect()->route('home');
        } catch (\Throwable $th) {
            Alert::error('error', $th->getMessage());
            return back();
        }
    }

    function logout()
    {
        if (!(Session::has('user') && Cookie::has('token'))) {
            Alert::warning('warning', 'Harap login dulu!');
            return view('auth.login');
        }
        Session::forget('user');
        if (Cookie::has('token')) {
            Cookie::forget('token');
        }
        return redirect()->route('login');
    }
}
