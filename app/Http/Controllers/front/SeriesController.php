<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function series()
    {
        $series = Series::paginate(10);
        return view('front.series', compact('series'));
    }
}