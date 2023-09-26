<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\docSeasons\DocSeasonsRequests;
use App\Models\DocumentalsSeasons as ModelsDocumentalsSeasons;
use Exception;
use Illuminate\Http\Request;

class DocumentalsSeasons extends Controller
{
    public function index($id)
    {
        $seasons = ModelsDocumentalsSeasons::where('serie_id', $id)->paginate(4);
        $serie_id = $id;
        return view('admin.documentalsSeasons.index', compact('seasons', 'serie_id'));
    }

    public function create($id)
    {
        $serie_id = $id;

        return view('admin.documentalsSeasons.create', compact('serie_id'));
    }

    public function store(DocSeasonsRequests $request, $id)
    {
        try {

            ModelsDocumentalsSeasons::create([
                'serie_id' => (int)$id,
                'season_name' => $request->season_name,
                "slug" => $request->slug
            ]);
            return redirect()->route('admin.documentals.documents', $id)->with("message", "məlumatlar bazaya əlavə edildi");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        $season = ModelsDocumentalsSeasons::findOrFail($id);
        return view('admin.seasons.edit', compact('season'));
    }

    public function update(DocSeasonsRequests $request, $id)
    {
        try {
            $season = ModelsDocumentalsSeasons::findOrFail($id);

            $season->update([
                'season_name' => $request->season_name,
                "slug" => $request->slug
            ]);
            return redirect()->route('admin.seasons.index', $season->serie_id)->with("message", "məlumatlar yeniləndilər");;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function destroy($id)
    {
        try {
            $season = ModelsDocumentalsSeasons::findOrFail($id);
            $season->delete();
            return redirect()->back()->with("message", "məlumat bazadan silindi");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
