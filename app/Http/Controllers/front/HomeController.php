<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\register\ReqisterRequest;
use App\Models\create_mainUsers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function hashParola($parola)
    {
        return hash('sha256', $parola);
    }

    public function activationCode()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($characters), 0, 10); // Generate a 10-character activation code
        return $code;
    }

    public function login()
    {
        return view('front.login');
    }

    public function register()
    {
        return view('front.register');
    }

    public function register_сheck(ReqisterRequest $request, create_mainUsers $mainUser)
    {
        $subject = 'PeroPlay Register';
        $code = $this->activationCode();
        $mainUser->create([
            'ip' => $request->ip(),
            'full_name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $this->hashParola($request->password),
            'activationCode' => $code,
            'activationStatus' => 0
        ]);


        $link = "http://127.0.0.1:8000/activation?email=" . $request->email . "&activation_code=" . $code;



        Mail::send('front.mail', [
            'text' => $link,
            "name" => $request->name
        ], function ($message) use ($subject) {
            $message->to("agamedov94@mail.ru")->subject($subject);
        });
        return redirect()->route('front.login')->with('success', 'daxil etdiyiniz elektron poçta təstiqlənmə linki göndərildi');



    }

    public function activation(Request $request)
    {
        $user = create_mainUsers::where('email', '=', $request->email)->where('activationCode', $request->activation_code)->first();

        try {
            $user->update(['activationStatus' => 1]);
            return redirect()->route('front.login')->with('success', 'siz uğurla qeydiyyatdan keçdiniz');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
