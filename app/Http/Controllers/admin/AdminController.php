<?php

namespace App\Http\Controllers\admin;

use Algolia\AlgoliaSearch\Http\Psr7\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminRequest;
use App\Http\Requests\admins\AdminsLoginRequest;
use App\Models\Admin;
use App\Models\create_mainUsers;
use Exception;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function activationCode()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($characters), 0, 10);
        return $code;
    }
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



    public function renewpassword()
    {
        return view('front.renewpassword');
    }


    public function check_renew_email(HttpRequest $request)
    {
        $getUser = create_mainUsers::where('email', $request->email)->first();
        if(!$getUser) {
            return redirect()->route('admin.renewpassword')->with('message', 'Belə bir elektron poçt ilə hesab mövcud deyl');
        }
        if ($getUser->isBlocked) {
            return redirect()->route('admin.renewpassword')->with('message', 'Hesabınız ban edilib. Zəhmət olmasa administrator ilə əlaqə saxlayın');
        } else {
            $subject = 'PeroPlay renew password';
            $code = $this->activationCode();

            $getUser->update([
                'activationCode' => $code,
            ]);


            $link = "http://127.0.0.1:8000/checkemailsucces?email=" . $getUser->email . "&activation_code=" . $code;

            Mail::send('front.renew', [
                'text' => $link,
                "name" => $getUser->full_name
            ], function ($message) use ($subject) {
                $message->to("agamedov94@mail.ru")->subject($subject);
            });

            return redirect()->route('front.login')->with('message', 'Elektron poçtunuza bərpa linki göndərildi');
        }
    }
}
