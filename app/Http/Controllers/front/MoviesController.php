<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
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

        return view('front.movies', compact('category', 'moviesResults', 'seriesResults', 'documentalsResults', 'oneSeriesDocumentalsResults', 'lastPhoto'));
    }
}
