<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\register\LoginRequest;
use App\Http\Requests\register\ReqisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\Adver;
use App\Models\create_mainUsers;
use App\Models\Documentals;
use App\Models\Favorites;
use App\Models\HomeCategories;
use App\Models\Movies;
use App\Models\OneSerieDocumentals;
use App\Models\Series;
use App\Models\Settings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $fixed = Adver::where('status', 1)->where('place', 'ana səhifə fixed reklamı')->first();

        $homeCats = HomeCategories::with(['movies', 'series', 'documentals', 'oneseriedocumentals'])
            ->where('status', 1)
            ->get();
        return view('front.home', compact('homeCats', 'fixed'));
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
                    "name" => $user->full_name
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
            if (Cookie::has('email')) {
                $loginCookieValue = Cookie::get('email');
                $user = create_mainUsers::where('email', $loginCookieValue)->first();
                if ($user->isBlocked != 0 or $user->activationStatus != 1) {
                    Cookie::queue(Cookie::make('email', "", -1));

                    return redirect()->route('front.login');
                }
            }
            Favorites::create(['type' => $type, 'movie_id' => $id, 'user_id' => $user->id]);

            return response()->json(['success' => true, 'type' => $type, 'id' => $id]);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }



    public function remove_cookie(Request $request, $type, $id)
    {
        try {
            if (Cookie::has('email')) {
                $loginCookieValue = Cookie::get('email');
                $user = create_mainUsers::where('email', $loginCookieValue)->first();
                if (!$user || $user->isBlocked != 0 || $user->activationStatus != 1) {
                    // User not found or not eligible, clear the email cookie and redirect.
                    Cookie::queue(Cookie::forget('email'));
                    return redirect()->route('front.login');
                }

                // User is eligible, proceed with deleting the favorite.
                $favorite = Favorites::where('type', $type)
                    ->where('movie_id', $id)
                    ->where('user_id', $user->id)
                    ->first();

                if ($favorite) {
                    $favorite->delete();
                    return response()->json(['success' => true, 'type' => $favorite, 'id' => $id, 'user_id' => $user->id]);
                } else {
                    // The favorite doesn't exist, return an error.
                    return response()->json(['error' => true, 'message' => 'Favorite not found.', 'TYPE' => $type]);
                }
            } else {
                // The 'email' cookie doesn't exist, return an error or handle as needed.
                return response()->json(['error' => true, 'message' => 'Email cookie not found.']);
            }
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }



    public function favorites()
    {
        if (Cookie::has('email')) {
            $loginCookieValue = Cookie::get('email');
            $user = create_mainUsers::where('email', $loginCookieValue)->first();
            if ($user->isBlocked != 0 or $user->activationStatus != 1) {
                Cookie::queue(Cookie::make('email', "", -1));

                return redirect()->route('front.login');
            }
        }
        $series = Favorites::where('type', '=', 'series')->where('user_id', $user->id)->get();
        $seriesIds = [];
        foreach ($series as $serie) {
            $serieFound = $serie->movie_id;
            array_push($seriesIds, $serieFound);
        }
        $seriesResults = Series::whereIn('id', $seriesIds)->get();

        $movies = Favorites::where('type', '=', 'movies')->where('user_id', $user->id)->get();
        $moviesIds = [];
        foreach ($movies as $movie) {
            $serieFound = $movie->movie_id;
            array_push($moviesIds, $serieFound);
        }
        $moviesResults = Movies::whereIn('id', $moviesIds)->get();

        $documentals = Favorites::where('type', '=', 'documentals')->where('user_id', $user->id)->get();
        $documentalsIds = [];
        foreach ($documentals as $documental) {
            $serieFound = $documental->movie_id;
            array_push($documentalsIds, $serieFound);
        }
        $documentalsResults = Documentals::whereIn('id', $documentalsIds)->get();


        $onseSeriesDocumentalsResults = Favorites::where('type', '=', 'oneseriedocumentals')->where('user_id', $user->id)->get();
        $onseSeriesIds = [];
        foreach ($onseSeriesDocumentalsResults as $documental) {
            $serieFound = $documental->movie_id;
            array_push($onseSeriesIds, $serieFound);
        }
        $onseSeriesDocumentalsResults = OneSerieDocumentals::whereIn('id', $onseSeriesIds)->get();

        return view('front.favorites', compact('seriesResults', 'moviesResults', 'documentalsResults', 'onseSeriesDocumentalsResults'));
    }




    public function checkemailsucces(Request $request)
    {
        $user = create_mainUsers::where('email', '=', $request->email)->where('activationCode', $request->activation_code)->first();
        $email = $request->email;
        $code = $request->activation_code;

        if ($user) {
            return view('front.checkemailsucces', compact('email', 'code'));
        } else {
            throw new NotFoundHttpException();
        }
    }






    public function resetpassword(ResetPasswordRequest $request)
    {

        if ($request->password != $request->repassword) {
            return redirect()->route('front.resetpasswordpage')->with('message', 'Şifrələr üst-üstə düşmürlər');
        }
        $user = create_mainUsers::where('email', '=', $request->email)->where('activationCode', $request->code)->first();
        try {
            $user->update(['password' => $this->hashParola($request->password)]);
            return redirect()->route('front.login')->with('message', 'şifrəniz yeniləndi');
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }
}
