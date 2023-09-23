<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SerieDetailsController extends Controller
{
    public function index($id)
    {
        $movie = Series::findOrFail($id);
        $seasonFirst = $movie->serie_seasons()->first();
        $serie_seasons = $movie->serie_seasons()->get();
        
        return view('front.serie_details', compact('movie', 'seasonFirst', 'serie_seasons'));
    }
}
