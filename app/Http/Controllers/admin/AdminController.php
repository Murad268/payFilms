<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminRequest;
use App\Http\Requests\admins\AdminsLoginRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.dashboard');
    }

    public function hashParola($parola)
    {
        return hash('sha256', $parola);
    }
    public function login()
    {
        return view('admin.login');
    }

    public function access_check(AdminsLoginRequest $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        $hashedPassword = $this->hashParola($password);
        $admin = Admin::where('login', $login)->where('password', $hashedPassword)->first();

        if ($admin) {
            Cookie::queue(Cookie::make('login', $login, 30 * 24 * 60));
            $admin->update(['isLogged' => 1]);
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.login')->with('message', 'login və ya şifrə yanlışdır');
        }
    }


    public function logout()
    {
        if (Cookie::has('login')) {
            $admin = Admin::where('login', Cookie::get('login'))->first();
            $admin->update(['isLogged' => 0]);
            Cookie::queue(Cookie::make('login', "", -1));
        }
        return redirect()->route('admin.login');
    }
}
