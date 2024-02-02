<?php

namespace App\Http\Controllers;

use App\API\UserApi;
use App\Exports\UserExport;
use App\Helpers\profile;
use App\Http\Requests\UserRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Jenssegers\Agent\Agent;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $data = 'Manajemen User';
        $res = UserApi::get();
        return view('user.index', ['title' => $data, 'data' => $res]);
    }

    public function store(UserRequest $request)
    {
        $photo = $request->file('photo');
        $data = [
            'username'  => $request->input('username'),
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => $request->input('password'),
        ];

        $res = UserApi::insert($photo, $data);
        if ($res->failed()) {
            Alert::error('Gagal', 'Gagal menambah User');
            return redirect()->route('user.index');
        }

        Alert::success('Berhasil', 'Berhasil menambah user');
        return redirect()->route('user.index');
    }

    public function update(Request $request, $id)
    {
        $agent = new Agent();
        $photo = $request->file('photo');
        $data = [
            'username'          => $request->username,
            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'photo'             => $photo,
            'users_id'          => profile::getUser()['id'],
            'browser'           => $agent->browser(),
            'browser_version'   => $agent->version($agent->browser()),
            'os'                => $agent->platform(),
            'ip_address'        => FacadesRequest::ip(),
            'mobile'            => $agent->device(),
        ];

        $res = UserApi::update($photo, $id, $data);

        if ($res->failed()) {
            Alert::error('Gagal', 'User gagal diubah');
        }
        Alert::success('Berhasil', 'User berhasil diubah');
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        UserApi::delete($id);
        Alert::success('Berhasil', 'User berhasil dihapus');
        return redirect()->route('user.index');
    }

    function excel()
    {
        return Excel::download(new UserExport, Carbon::now()->format('d_m_Y') . '.' . 'xlsx');
    }

    function pdf()
    {
        $data['list'] = UserApi::get();
        $pdf = Pdf::loadView('exports.pdf.users', $data);
        return $pdf->download('test.pdf');
    }
}
