<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Documentals;
use App\Models\OneSerieDocumentals;
use App\Models\Series;
use Illuminate\Http\Request;

class DocumentalsController extends Controller
{
    public function documentals()
    {
        $documentals = Documentals::paginate(10);
        $oneseriesdocumentals = OneSerieDocumentals::paginate(10);
        return view('front.documentals', compact('documentals', 'oneseriesdocumentals'));
    }


    public function documental($id)
    {
        $movie = OneSerieDocumentals::findOrFail($id);
        return view('front.details', compact('movie'));
    }




    public function sezonedDocumental($id)
    {
        $movie = Documentals::findOrFail($id);
        $seasonFirst = $movie->serie_seasons()->first();
        $serie_seasons = $movie->serie_seasons()->get();
        $first_season = $movie->serie_seasons()->first();

        $first_episode = $first_season->episodes->first();
        return view('front.serie_details', compact('movie', 'seasonFirst', 'serie_seasons', 'first_episode'));
    }
}
