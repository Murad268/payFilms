<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\documents\DocumentalsRequestUpdate;
use App\Http\Requests\documents\DocumentsRequest;
use App\Models\Categories;
use App\Models\Documentals;
use App\Models\HomeCategories;
use App\Services\DocumentalsService;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function __construct(private DocumentalsService $documentalsService)
    {
    }

    public function index(Request $request)
    {
        $query = Documentals::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('slug', 'like', '%' . $searchTerm . '%');
            });
        }

        $series = $query->paginate(10);

        return view('admin.documentals.index', compact('series'));
    }
    public function create()
    {
        $categories = Categories::all();
        $homeCategories = HomeCategories::all();
        return view('admin.documentals.create', compact('homeCategories', 'categories'));
    }

    public function store(DocumentsRequest $request)
    {
        $this->documentalsService->create($request);
        return redirect()->route('admin.documentals.index')->with("message", "məlumat bazaya əlavə edildi");
    }



    public function edit($id)
    {
        $categories = Categories::all();
        $homeCategories = HomeCategories::all();
        $serie = Documentals::findOrFail($id);
        return view('admin.documentals.edit', compact('homeCategories', 'categories', 'serie'));
    }


    public function update(DocumentalsRequestUpdate $request, $id)
    {
        $this->documentalsService->update($request, $id);
        return redirect()->route('admin.documentals.index')->with("message", "məlumatlar yeniləndilər");
    }


    public function destroy($id)
    {
        $this->documentalsService->delete($id);
        return redirect()->route('admin.documentals.index')->with("message", "məlumat bazadan silindi");
    }
}
