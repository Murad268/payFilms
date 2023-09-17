<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\actors\ActorsRequest;
use App\Http\Requests\directors\DirectorsRequest;
use App\Models\Actors;
use App\Models\DirectorModel;
use App\Services\ActorsService;
use App\Services\DirectorService;
use Illuminate\Http\Request;

class DirectorsController extends Controller
{
    public function __construct(private DirectorService $directorService)
    {
    }

    public function index()
    {
        $directors = DirectorModel::paginate(10);
        return view('admin.directors.index', compact('directors'));
    }

    public function create()
    {
        return view('admin.directors.create');
    }


    public function store(DirectorsRequest $request)
    {
        $this->directorService->create($request);
        return redirect()->route('admin.directors.index');
    }


    public function edit($id)
    {
        $director = DirectorModel::findOrFail($id);
        return view('admin.directors.update', compact('director'));
    }

    public function update(DirectorsRequest $request, $id)
    {
        $this->directorService->update($request, $id);
        return redirect()->route('admin.directors.index')->with("message", "the information has been updated to the database");
    }

    public function destroy($id)
    {
        $this->directorService->delete($id);
        return redirect()->route('admin.directors.index')->with('message', 'the information was deleted from the database');
    }


}
