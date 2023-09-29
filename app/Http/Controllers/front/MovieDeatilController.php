<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Movies;
use App\Models\Views;
use Illuminate\Http\Request;

class MovieDeatilController extends Controller
{
    public function index($id)
    {
        $movie = Movies::findOrFail($id);
        $views = Views::where('movie_id', $id)->get();

        if ($views->isEmpty()) {
            Views::create(['movie_id' => $id, 'count' => 1]);
        } else {
            $view = $views->first();
            $view->count += 1;
            $view->save();
        }
        return view('front.details', compact('movie'));
    }
}
