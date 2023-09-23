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
        $seriesResults = Series::where('name', 'like', '%' . $searchQuery . '%')->paginate(10);

        $moviesResults = Movies::where('name', 'like', '%' . $searchQuery . '%')->paginate(10);

        return view('front.search', ['seriesResults' => $seriesResults, 'moviesResults' => $moviesResults, 'q' => $request->q]);
    }
}
