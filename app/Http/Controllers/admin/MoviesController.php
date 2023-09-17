<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\movies\CreateMovieRequest;
use App\Http\Requests\movies\UpdateMovieRequest;
use App\Models\Actors;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\DirectorModel;
use App\Models\HomeCategories;
use App\Models\Movies;
use App\Models\Scriptwriter;
use App\Services\MovieService;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function __construct(private MovieService $movieService)
    {
    }
    public function index()
    {
        $movies = Movies::paginate(10);
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        $categories = Categories::all();
        $homeCategories = HomeCategories::all();
        return view('admin.movies.create', compact('homeCategories', 'categories'));
    }

    public function store(CreateMovieRequest $request)
    {
        $this->movieService->create($request);
        return redirect()->route('admin.movies.index')->with("message", "the information was added to the database");
    }


    public function edit($id)
    {
        $categories = Categories::all();
        $homeCategories = HomeCategories::all();
        $movie = Movies::findOrFail($id);
        return view('admin.movies.edit', compact('homeCategories', 'categories', 'movie'));
    }

    public function update(UpdateMovieRequest $request, $id)
    {
        $this->movieService->update($request, $id);
        return redirect()->route('admin.movies.index')->with("message", "the information has been updated");
    }
    public function destroy($id)
    {
        $this->movieService->delete($id);
        return redirect()->route('admin.movies.index')->with("message", "the information was deleted from the database");
    }
}
