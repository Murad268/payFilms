<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SerieDetailsController extends Controller
{
    public function index($id)
    {
        $movie = Series::findOrFail($id);
        return view('front.serie_details', compact('movie'));
    }
}
