<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Adver;
use App\Models\Categories;
use App\Models\Documentals;
use App\Models\Movies;
use App\Models\OneSerieDocumentals;
use App\Models\PagesPhotos;
use App\Models\Series;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function movies($slug)
    {
        $first = Adver::where('status', 1)->where('place', 'keteqoriya əsaslı filmlər səhifəsi - filmlər bölməsi reklamı')->first();
        $second = Adver::where('status', 1)->where('place', 'keteqoriya əsaslı filmlər səhifəsi - seriallar bölməsi reklamı')->first();
        $third = Adver::where('status', 1)->where('place', 'keteqoriya əsaslı filmlər səhifəsi - sənədli filmlər bölməsi reklamı')->first();
        $fifty = Adver::where('status', 1)->where('place', 'keteqoriya əsaslı filmlər səhifəsi - bir sezonlu sənədli filmlər bölməsi')->first();


        $currentLocale = app()->getLocale();

        $category = Categories::where("slug->$currentLocale", $slug)->first();
        if (!$category) {
            return abort(404);
        }
        $seriesResults = Series::where('movie_category_id', $category->id)->whereHas('serie_seasons.episodes')->where('status', 1)->paginate(10);
        $moviesResults = Movies::where('movie_category_id', $category->id)->where('status', 1)->paginate(10);
        $documentalsResults = Documentals::where('movie_category_id', $category->id)->whereHas('serie_seasons.episodes')->where('status', 1)->paginate(10);
        $oneSeriesDocumentalsResults = OneSerieDocumentals::where('movie_category_id', $category->id)->where('status', 1)->paginate(10);
        $lastPhoto = PagesPhotos::where('page', 'kateqoriya üzrə filmlər səhvəsi')->first();

        return view('front.movies', compact('category', 'moviesResults', 'seriesResults', 'documentalsResults', 'oneSeriesDocumentalsResults', 'lastPhoto', 'first', 'second', 'third', 'fifty'));
    }
}
