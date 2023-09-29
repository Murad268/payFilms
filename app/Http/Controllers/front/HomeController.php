<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\register\LoginRequest;
use App\Http\Requests\register\ReqisterRequest;
use App\Models\create_mainUsers;
use App\Models\Favorites;
use App\Models\HomeCategories;
use App\Models\Settings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{


    public function front()
    {
        $settings = Settings::first();
        return view('front.homeindex', compact('settings'));
    }
    public function hashParola($parola)
    {
        return hash('sha256', $parola);
    }

    public function activationCode()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($characters), 0, 10);
        return $code;
    }

    public function index()
    {
        $homeCats = HomeCategories::with(['movies', 'series', 'documentals', 'oneseriedocumentals'])
            ->where('status', 1)
            ->get();
        return view('front.home', compact('homeCats'));
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

        $findUserCount = create_mainUsers::where('email', $request->email)->count();
        if ($findUserCount > 0) {
            return redirect()->route('front.register')->with('message', 'daxil etdiyiniz elektron poçtla artıq istifadəçi mövcuddur');
        }


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




    public function login_check(LoginRequest $request)
    {
        $findUserCount = create_mainUsers::where('email', $request->email)->where('password', $this->hashParola($request->password));

        if ($findUserCount->count() < 1) {
            return redirect()->route('front.login')->with('message', 'istifadəçi tapılmadı');
        } else {
            $user = $findUserCount->first();

            $subject = 'PeroPlay Register';
            $code = $this->activationCode();

            $user->update([
                'activationCode' => $code,
            ]);


            $link = "http://127.0.0.1:8000/activation?email=" . $user->email . "&activation_code=" . $code;


            if ($user->activationStatus == 0) {
                Mail::send('front.mail', [
                    'text' => $link,
                    "name" => $user->name
                ], function ($message) use ($subject) {
                    $message->to("agamedov94@mail.ru")->subject($subject);
                });
                return redirect()->route('front.login')->with('message', 'hesabınız aktivləşdirilməyib. Daxil etdiyiniz elektron poçta təstiqlənmə linki yenidən göndərildi');
            } else {
                if ($user->isBlocked == 1) {
                    return redirect()->route('front.login')->with('message', 'hesabınız ban edilib. Xahiş edirik administrator ilə əlaqə saxlayın');
                }
                Cookie::queue(Cookie::make('email', $user->email, 30 * 24 * 60));
                return redirect()->route('front.index');
            }
        };
    }



    public function add_cookie(Request $request, $type, $id)
    {
        try {
            Favorites::create(['type' => $type, 'movie_id' => $id]);
            return response()->json(['success' => true, 'type' => $type, 'id' => $id]);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }



    public function remove_cookie(Request $request, $type, $id)
    {
        try {
            $favorite = Favorites::where('type', $type)->where('movie_id', $id)->first();
            $favorite->delete();
            return response()->json(['success' => true, 'type' => $type, 'id' => $favorite]);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }
}
