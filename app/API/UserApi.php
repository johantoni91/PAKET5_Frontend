<?php

namespace App\API;

use App\Helpers\log;
use App\Helpers\profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Agent;

class UserApi
{
    public static function get()
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/users', log::insert())->json()['data'];
    }

    public static function insert($photo, $data)
    {
        $agent = new Agent();
        if (!$photo == null) {
            return Http::attach('photo', file_get_contents($photo), mt_rand() . '.' . $photo->getClientOriginalExtension())
                ->post(env('API_URL', '') . '/register', [
                    'username'          => $data['username'],
                    'name'              => $data['name'],
                    'email'             => $data['email'],
                    'phone'             => $data['phone'],
                    'password'          => $data['password'],
                    'photo'             => $photo,
                    'users_id'          => profile::getUser()['id'],
                    'browser'           => $agent->browser(),
                    'browser_version'   => $agent->version($agent->browser()),
                    'os'                => $agent->platform(),
                    'ip_address'        => Request::ip(),
                    'mobile'            => $agent->device(),
                ]);
        }
        return Http::post(env('API_URL', '') . '/register', [
            'username'          => $data['username'],
            'name'              => $data['name'],
            'email'             => $data['email'],
            'phone'             => $data['phone'],
            'password'          => $data['password'],
            'photo'             => $photo,
            'users_id'          => profile::getUser()['id'],
            'browser'           => $agent->browser(),
            'browser_version'   => $agent->version($agent->browser()),
            'os'                => $agent->platform(),
            'ip_address'        => Request::ip(),
            'mobile'            => $agent->device(),
        ]);
    }

    public static function update($photo, $id, $data)
    {
        $agent = new Agent();
        if (!$photo == null) {
            return Http::withToken(profile::getToken())->attach('photo', file_get_contents($photo), mt_rand() . '.' . $photo->getClientOriginalExtension())
                ->post(env('API_URL', '') . '/user' . '/' . $id . '/update', $data);
        } else {
            return Http::withToken(profile::getToken())->post(env('API_URL', '') . '/user' . '/' . $id . '/update', [
                'username'          => $data['username'],
                'name'              => $data['name'],
                'email'             => $data['email'],
                'phone'             => $data['phone'],
                'photo'             => $data['photo'],
                'users_id'          => profile::getUser()['id'],
                'browser'           => $agent->browser(),
                'browser_version'   => $agent->version($agent->browser()),
                'os'                => $agent->platform(),
                'ip_address'        => Request::ip(),
                'mobile'            => $agent->device(),
            ]);
        }
    }

    public static function delete($id)
    {
        return Http::withToken(profile::getToken())->get(env('API_URL', '') . '/user' . '/' . $id . '/delete', log::insert());
    }
}
