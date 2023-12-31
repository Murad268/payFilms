<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Adver;
use App\Models\Categories;
use App\Models\PagesPhotos;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function series()
    {
        $series = Series::whereHas('serie_seasons.episodes')->where('status', 1)->paginate(10);
        $lastPhoto = PagesPhotos::where('page', 'seriallar səhvəsi')->first();
        $fixed = Adver::where('status', 1)->where('place', 'seriallar səhifəsi reklamı')->first();

        return view('front.series', compact('series', 'lastPhoto', 'fixed'));
    }
}
