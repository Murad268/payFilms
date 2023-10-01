<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Adver;
use App\Models\Series;
use App\Models\SeriesEpisodes;
use App\Models\Views;
use Illuminate\Http\Request;

class SerieDetailsController extends Controller
{
    public function index($id)
    {
        $movie = Series::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(slug, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($id) . '%'])->where('status', 1)->first();
        $views = Views::where('serie_id', $movie->id)->get();
        $firsl = Adver::where('status', 1)->where('place', 'detallar')->first();
        if ($views->isEmpty()) {
            Views::create(['serie_id' => $movie->id, 'count' => 1]);
        } else {
            $view = $views->first();
            $view->count += 1;
            $view->save();
        }
        $seasonFirst = $movie->serie_seasons()->first();
        $serie_seasons = $movie->serie_seasons()->get();
        $first_season = $movie->serie_seasons()->first();

        $first_episode = $first_season->episodes->first();
        return view('front.serie_details', compact('movie', 'firsl','seasonFirst', 'serie_seasons', 'first_episode'));
    }


    public function get_serie(Request $request)
    {
        $episode = SeriesEpisodes::where('id', $request->id)->first();
        return response()->json(['success' => false, 'episode' => $episode]);
    }
}
