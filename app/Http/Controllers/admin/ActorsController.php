<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\actors\ActorsRequest;
use App\Models\Actors;
use App\Services\ActorsService;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    public function __construct(private ActorsService $actorsService)
    {
    }

    public function index()
    {
        $actors = Actors::paginate(10);
        return view('admin.actors.index', compact('actors'));
    }

    public function create()
    {
        return view('admin.actors.create');
    }


    public function store(ActorsRequest $request)
    {
        $this->actorsService->create($request);
        return redirect()->route('admin.actors.index');
    }


    public function edit($id)
    {
        $actor = Actors::findOrFail($id);
        return view('admin.actors.edit', compact('actor'));
    }

    public function update(ActorsRequest $request, $id)
    {
        $this->actorsService->update($request, $id);
        return redirect()->route('admin.actors.index')->with("message", "the information has been updated to the database");
    }
 
    public function destroy($id)
    {
        $this->actorsService->delete($id);
        return redirect()->route('admin.actors.index')->with('message', 'the information was deleted from the database');
    }
}
