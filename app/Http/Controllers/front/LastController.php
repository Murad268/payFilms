<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Movies;
use Illuminate\Http\Request;

class LastController extends Controller
{
    public function last_uploads()
    {
        $movies = Movies::orderBy('created_at', 'desc')->paginate(10);
        return view('front.last', compact('movies'));
    }
}
