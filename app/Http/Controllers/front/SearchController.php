<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Documentals;
use App\Models\HomeCategories;
use App\Models\Movies;
use App\Models\OneSerieDocumentals;
use App\Models\PagesPhotos;
use App\Models\Series;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('q');
        $moviesResults = Movies::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($searchQuery) . '%'])->where('status', 1)->paginate(10);
        $seriesResults = Series::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($searchQuery) . '%'])->whereHas('serie_seasons.episodes')->where('status', 1)->paginate(10);
        $documentalsResults = Documentals::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($searchQuery) . '%'])->whereHas('serie_seasons.episodes')->where('status', 1)->paginate(10);
        $oneSeriesDocumentalsResults = OneSerieDocumentals::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($searchQuery) . '%'])->where('status', 1)->paginate(10);
        $lastPhoto = PagesPhotos::where('page', 'axtarış nəticəsi səhvəsi')->first();

        return view('front.search', ['oneSeriesDocumentalsResults' => $oneSeriesDocumentalsResults, "documentalsResults" => $documentalsResults, 'seriesResults' => $seriesResults, 'moviesResults' => $moviesResults, 'q' => $request->q, 'lastPhoto' => $lastPhoto]);
    }
}
