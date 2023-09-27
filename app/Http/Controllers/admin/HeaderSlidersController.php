<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Documentals;
use App\Models\HeaderSlider;
use App\Models\Movies;
use App\Models\OneSerieDocumentals;
use App\Models\Series;
use Illuminate\Http\Request;

class HeaderSlidersController extends Controller
{
    public function index()
    {
        $seriesSlider = HeaderSlider::where('serie_id', '!=', null)->first();
        $movieSlider = HeaderSlider::where('movie_id', '!=', null)->first();
        $documentalSlider = HeaderSlider::where('documental_id', '!=', null)->first();
        $oneserieDocumentals = HeaderSlider::where('oneseriedocumentals_id', '!=', null)->first();


        $sliders = [];

        if ($seriesSlider) {
            $series = Series::findOrFail($seriesSlider->serie_id);
            $series->type = "serial";
            $sliders[] = $series;
        }

        if ($movieSlider) {
            $movies = Movies::findOrFail($movieSlider->movie_id);
            $movies->type = "film";
            $sliders[] = $movies;
        }

        if ($documentalSlider) {
            $documentals = Documentals::findOrFail($documentalSlider->documental_id);
            $documentals->type = "sənədli film";
            $sliders[] = $documentals;
        }

        if ($oneserieDocumentals) {
            $documentals = OneSerieDocumentals::findOrFail($oneserieDocumentals->oneseriedocumentals_id);
            $documentals->type = "bir bölümlük sənədli film";
            $sliders[] = $documentals;
        }


        return view('admin.header_sliders.index', compact('sliders'));
    }


    public function searchindex()
    {
        return view('admin.header_sliders.searchindex');
    }


    public function search(Request $request)
    {
        $type = $request->input('type');
        $search = $request->input('search');

        if ($type == 'movies') {
            $moviesResults = Movies::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($search) . '%'])->where('status', 1)->paginate(10);
        } else if ($type == 'series') {
            $moviesResults = Series::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($search) . '%'])->where('status', 1)->paginate(10);
        } else if ($type == 'documentals') {
            $moviesResults = Documentals::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($search) . '%'])->where('status', 1)->paginate(10);
        } else if ($type == "oneseriesdocumentals") {
            $moviesResults = OneSerieDocumentals::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($search) . '%'])->where('status', 1)->paginate(10);
        }

        if($moviesResults->count() < 1) {
            return redirect()->back()->with('errornotfound', "Axtarışa uyğun nəticə tapılmadı. Ya belə bir məlumat bazada yoxdur, ya da bu məlumatın bazadakı statusu aktiv deyil");
        }
        return view('admin.header_sliders.search', compact("moviesResults"));
    }
}
