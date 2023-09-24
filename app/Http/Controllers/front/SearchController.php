<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\HomeCategories;
use App\Models\Movies;
use App\Models\Series;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('q');
        $moviesResults = Movies::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($searchQuery) . '%'])->paginate(10);
        $seriesResults = Series::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($searchQuery) . '%'])->paginate(10);
        return view('front.search', ['seriesResults' => $seriesResults, 'moviesResults' => $moviesResults, 'q' => $request->q]);
    }
}
