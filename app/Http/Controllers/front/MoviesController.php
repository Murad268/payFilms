<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Movies;
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
        $seriesResults = Series::where('movie_category_id', $category->id)->paginate(10);

        $moviesResults = Movies::where('movie_category_id', $category->id)->paginate(10);


        return view('front.movies', compact('category', 'moviesResults', 'seriesResults'));
    }
}
