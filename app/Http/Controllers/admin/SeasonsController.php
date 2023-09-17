<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\seasons\SeasonsRequest;
use App\Models\Seasons;
use Exception;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index($id)
    {
        $seasons = Seasons::where('serie_id', $id)->paginate(4);
        $serie_id = $id;
        return view('admin.seasons.index', compact('seasons', 'serie_id'));
    }

    public function create($id)
    {
        $serie_id = $id;

        return view('admin.seasons.create', compact('serie_id'));
    }

    public function store(SeasonsRequest $request, $id)
    {
        try {

            Seasons::create([
                'serie_id' => (int)$id,
                'season_name' => $request->season_name,
                "slug" => $request->slug
            ]);
            return redirect()->route('admin.seasons.index', $id)->with("message", "the information was added to the database");;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        $season = Seasons::findOrFail($id);
        return view('admin.seasons.edit', compact('season'));
    }

    public function update(SeasonsRequest $request, $id)
    {
        try {
            $season = Seasons::findOrFail($id);

            $season->update([
                'season_name' => $request->season_name,
                "slug" => $request->slug
            ]);
            return redirect()->route('admin.seasons.index', $season->serie_id)->with("message", "the information has been updated");;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function destroy($id)
    {
        try {
            $season = Seasons::findOrFail($id);
            $season->delete();
            return redirect()->back()->with("message", "the information was deleted from the database");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
