<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\PagesPhotos;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function index()
    {
        $settings = Settings::first();
        $lastPhoto = PagesPhotos::where('page', 'əlaqə səhvəsi')->first();

        return view('front.contact', compact('settings', 'lastPhoto'));
    }





    public function sendmessages(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $desc = $request->message;

        Mail::send('front.sendmail', [
            'name' => $name,
            'email' => $email,
            'desc' => $desc,
        ], function ($message) use ($subject) {
            $message->to("agamedov94@mail.ru")->subject($subject);
        });
    }
}
