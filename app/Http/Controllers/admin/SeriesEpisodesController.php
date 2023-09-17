<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\episodes\EpisodeRequest;
use App\Models\SeriesEpisodes;
use Exception;

class SeriesEpisodesController extends Controller
{
    public function index($id, $serie_id)
    {
        $episodes = SeriesEpisodes::where('serie_id', $serie_id)->where('season_id', $id)->paginate(4);
        $serie_id = $serie_id;
        $id = $id;
        return view('admin.episodes.index', compact('episodes', 'serie_id', 'id'));
    }

    public function create($id, $serie_id)
    {
        $serie_id = $serie_id;
        $id = $id;
        return view('admin.episodes.create', compact('id', 'serie_id'));
    }


    public function store(EpisodeRequest $request, $id, $serie_id)
    {
        try {
            SeriesEpisodes::create([
                'episode_order' => (int)$request->episode_order,
                'serie_id' => $request->serie_id,
                "season_id" => $request->id,
                'episode_name' => $request->episode_name,
                'slug' => $request->slug,
                'link' => $request->link,
                'quality' => $request->quality,
                'length' => $request->length,
                'release' => $request->release
            ]);
            return redirect()->route('admin.seasons.episodes.index', ['id' => $id, 'serie_id' => $serie_id])->with("message", "the information was added to the database");;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function edit($id, $serie_id)
    {
        $episode = SeriesEpisodes::where('serie_id', $serie_id)->where('id', $id)->first();
        $serie_id = $serie_id;
        $id = $id;
        return view('admin.episodes.update', compact('id', 'serie_id', 'episode'));
    }

    public function update(EpisodeRequest $request, $id, $serie_id)
    {
        try {
            $episode = SeriesEpisodes::where('serie_id', $serie_id)->where('id', $id)->first();
            $episode->update([
                'episode_order' => (int)$request->episode_order,
                'episode_name' => $request->episode_name,
                'slug' => $request->slug,
                'link' => $request->link,
                'quality' => $request->quality,
                'length' => $request->length,
                'release' => $request->release,
            ]);
            return redirect()->route('admin.seasons.episodes.index', ['id' => $episode->season_id, 'serie_id' => $episode->serie_id])->with("message", "the information has been updated");;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
