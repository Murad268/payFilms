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


    public function searchindex() {
        return view('admin.header_sliders.searchindex');
    }


    public function search($type) {
        dd($type);
    }
}
