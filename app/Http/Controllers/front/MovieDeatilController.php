<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Adver;
use App\Models\Movies;
use App\Models\Views;
use Illuminate\Http\Request;

class MovieDeatilController extends Controller
{
    public function index($id)
    {

        $firsl = Adver::where('status', 1)->where('place', 'detallar')->first();
        $movie = Movies::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(slug, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($id) . '%'])->where('status', 1)->first();

        $views = Views::where('movie_id', $movie->id)->get();

        if ($views->isEmpty()) {
            Views::create(['movie_id' => $movie->id, 'count' => 1]);
        } else {
            $view = $views->first();
            $view->count += 1;
            $view->save();
        }
        return view('front.details', compact('movie', 'firsl'));
    }
}
