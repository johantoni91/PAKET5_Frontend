<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function home()
    {
        $data['title'] = 'Dashboard';
        return view("index", $data);
    }

    public function loginPage()
    {
        if (Http::get(env('SET_API', ''))->status() == 500) {
            Alert::error('Error', 'Server sedang bermasalah');
            return view('errors.500');
        }

        $data['title'] = 'Login';
        if (Session::has('user')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login', $data);
    }

    public function login(Request $request)
    {
        $agent = new Agent();
        $res = Http::post(env('API_URL', '') . '/login', [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'browser' => $agent->browser(),
            'browser_version' => $agent->version($agent->browser()),
            'os' => $agent->platform(),
            'ip_address' => $request->ip(),
            'mobile' => $agent->device(),
        ]);
        if (!$res->successful()) {
            Alert::error('Gagal', 'Login gagal');
            return back();
        }

        $data = $res->json();
        Session::put('user', $data);

        if ($request->remember == 1) {
            Cookie::make('token', $data['token'], 60 * 60 * 24);
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        if (Cookie::has('token')) {
            Cookie::forget('token');
        }
        Session::flush();
        return redirect('/login');
    }
}
