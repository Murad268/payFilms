<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\movies\CreateMovieRequest;
use App\Http\Requests\series\SeriesRequest;
use App\Http\Requests\movies\UpdateMovieRequest;
use App\Http\Requests\series\SeriesRequestUpdate;
use App\Models\Categories;
use App\Models\HomeCategories;
use App\Models\Series;
use App\Services\SeriesService;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesService $seriesService)
    {
    }
    public function index()
    {
        $series = Series::paginate(10);
        return view('admin.series.index', compact('series'));
    }

    public function create()
    {
        $categories = Categories::all();
        $homeCategories = HomeCategories::all();
        return view('admin.series.create', compact('homeCategories', 'categories'));
    }

    public function store(SeriesRequest $request)
    {
        $this->seriesService->create($request);
        return redirect()->route('admin.series.index')->with("message", "the information was added to the database");
    }


    public function edit($id)
    {
        $categories = Categories::all();
        $homeCategories = HomeCategories::all();
        $serie = Series::findOrFail($id);
        return view('admin.series.edit', compact('homeCategories', 'categories', 'serie'));
    }

    public function update(SeriesRequestUpdate $request, $id)
    {
        $this->seriesService->update($request, $id);
        return redirect()->route('admin.series.index')->with("message", "the information has been updated to the database");
    }

    public function destroy($id)
    {
        $this->seriesService->delete($id);
        return redirect()->route('admin.series.index')->with("message", "the information was deleted from the database");
    }
}
