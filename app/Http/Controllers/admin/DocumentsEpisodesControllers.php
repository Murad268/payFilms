<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\documentsEpisodes\DocumentEpisodesRequest;
use App\Models\DocumentalsEpisodes;
use Exception;
use Illuminate\Http\Request;

class DocumentsEpisodesControllers extends Controller
{
    public function index($id, $serie_id)
    {
        $episodes = DocumentalsEpisodes::where('serie_id', $serie_id)->where('season_id', $id)->paginate(4);
        $serie_id = $serie_id;
        $id = $id;
        return view('admin.documentalsEpisodes.index', compact('episodes', 'serie_id', 'id'));
    }

    public function create($id, $serie_id)
    {
        $serie_id = $serie_id;
        $id = $id;
        return view('admin.documentalsEpisodes.create', compact('id', 'serie_id'));
    }


    public function store(DocumentEpisodesRequest $request, $id, $serie_id)
    {
        try {
            DocumentalsEpisodes::create([
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
            return redirect()->route('admin.seasons.documentalsEpisodes.index', ['id' => $id, 'serie_id' => $serie_id])->with("message", "məlumatlar bazaya əlavə edildi");;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function edit($id, $serie_id)
    {
        $episode = DocumentalsEpisodes::where('serie_id', $serie_id)->where('id', $id)->first();
        $serie_id = $serie_id;
        $id = $id;
        return view('admin.episodes.update', compact('id', 'serie_id', 'episode'));
    }

    public function update(DocumentEpisodesRequest $request, $id, $serie_id)
    {
        try {
            $episode = DocumentalsEpisodes::where('serie_id', $serie_id)->where('id', $id)->first();
            $episode->update([
                'episode_order' => (int)$request->episode_order,
                'episode_name' => $request->episode_name,
                'slug' => $request->slug,
                'link' => $request->link,
                'quality' => $request->quality,
                'length' => $request->length,
                'release' => $request->release,
            ]);
            return redirect()->route('admin.seasons.documentalsEpisodes.index', ['id' => $episode->season_id, 'serie_id' => $episode->serie_id])->with("message", "məlumatlar yeniləndilər");;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function destroy($id)
    {
        $episode = DocumentalsEpisodes::where('id', $id)->first();
        $episode->delete();
        return redirect()->route('admin.seasons.documentalsEpisodes.index', ['id' => $episode->season_id, 'serie_id' => $episode->serie_id])->with("message", "məlumatlar uğurla silindilər");;
    }
}
