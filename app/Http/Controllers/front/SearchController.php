<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Adver;
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


        $first = Adver::where('status', 1)->where('place', 'axtarış nəticəsi-filmlər bölməsi')->first();
        $second = Adver::where('status', 1)->where('place', 'axtarış nəticəsi-seriallar bölməsi')->first();
        $third = Adver::where('status', 1)->where('place', 'axtarış nəticəsi-çox sezonlu sənədli filmlər bölməsi')->first();
        $fifty = Adver::where('status', 1)->where('place', 'axtarış nəticəsi-tek sezonlu sənədli filmlər bölməsi')->first();

        return view('front.search', ['oneSeriesDocumentalsResults' => $oneSeriesDocumentalsResults, "documentalsResults" => $documentalsResults, 'seriesResults' => $seriesResults, 'moviesResults' => $moviesResults, 'q' => $request->q, 'lastPhoto' => $lastPhoto, 'first'=>$first, 'second'=>$second, "third" => $third, 'fifty' => $fifty]);
    }
}
