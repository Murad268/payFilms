<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Documentals;
use App\Models\DocumentalsEpisodes;
use App\Models\OneSerieDocumentals;
use App\Models\PagesPhotos;
use App\Models\Series;
use App\Models\Views;
use Illuminate\Http\Request;

class DocumentalsController extends Controller
{
    public function documentals()
    {
        $documentals = Documentals::whereHas('serie_seasons.episodes')->where('status', 1)->paginate(10);
        $oneseriesdocumentals = OneSerieDocumentals::where('status', 1)->paginate(10);
        $lastPhoto = PagesPhotos::where('page', 'sənədli filmlər səhvəsi')->first();

        return view('front.documentals', compact('documentals', 'oneseriesdocumentals', 'lastPhoto'));
    }


    public function documental($id)
    {
        $movie = OneSerieDocumentals::findOrFail($id);
        $views = Views::where('oneseriesdocumentals_id', $id)->get();

        if ($views->isEmpty()) {
            Views::create(['oneseriesdocumentals_id' => $id, 'count' => 1]);
        } else {
            $view = $views->first();
            $view->count += 1;
            $view->save();
        }
        return view('front.details', compact('movie'));
    }




    public function sezonedDocumental($id)
    {
        $movie = Documentals::findOrFail($id);
        $views = Views::where('documental_id', $id)->get();

        if ($views->isEmpty()) {
            Views::create(['documental_id' => $id, 'count' => 1]);
        } else {
            $view = $views->first();
            $view->count += 1;
            $view->save();
        }
        $seasonFirst = $movie->serie_seasons()->first();
        $serie_seasons = $movie->serie_seasons()->get();
        $first_season = $movie->serie_seasons()->first();

        $first_episode = $first_season->episodes->first();
        return view('front.serie_details', compact('movie', 'seasonFirst', 'serie_seasons', 'first_episode'));
    }


    public function get_documentals(Request $request)
    {
        $episode = DocumentalsEpisodes::where('id', $request->id)->first();
        return response()->json(['success' => false, 'id' => $request->id, 'episode' => $episode]);
    }
}
