<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Movies;
use Illuminate\Http\Request;

class MovieDeatilController extends Controller
{
    public function index($id)
    {
        $movie = Movies::findOrFail($id);
        return view('front.details', compact('movie'));
    }
}
