<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Adver;
use App\Models\Movies;
use App\Models\PagesPhotos;
use Illuminate\Http\Request;

class LastController extends Controller
{
    public function last_uploads()
    {
        $fixed = Adver::where('status', 1)->where('place', 'ən son yüklənən filmlər səhifəsində reklam')->first();

        $movies = Movies::orderBy('created_at', 'desc')->where('status', 1)->paginate(10);
        $lastPhoto = PagesPhotos::where('page', 'ən son yüklənən filmlər səhvəsi')->first();
        return view('front.last', compact('movies', 'lastPhoto', 'fixed'));
    }
}
