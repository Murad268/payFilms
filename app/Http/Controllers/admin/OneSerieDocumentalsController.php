<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\oneseriedocumentals\OneSerieDocumentalsRequest;
use App\Http\Requests\oneseriedocumentals\OneSerieDocumentalsRequestUpdate;
use App\Models\Categories;
use App\Models\HomeCategories;
use App\Models\OneSerieDocumentals;
use App\Services\OneSerieDocumentalsService;
use Illuminate\Http\Request;

class OneSerieDocumentalsController extends Controller
{
    public function __construct(private OneSerieDocumentalsService $movieService)
    {
    }


    public function index(Request $request)
    {
        $query = OneSerieDocumentals::query();

        // Check if a search query is provided
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('slug', 'like', '%' . $searchTerm . '%');
            });
        }

        $movies = $query->paginate(10);

        return view('admin.oneseriedocumentals.index', compact('movies'));
    }

    public function create()
    {
        $categories = Categories::all();
        $homeCategories = HomeCategories::all();
        return view('admin.oneseriedocumentals.create', compact('homeCategories', 'categories'));
    }

    public function store(OneSerieDocumentalsRequest $request)
    {
        $this->movieService->create($request);
        return redirect()->route('admin.oneseriedocumentals.index')->with("message", "məlumat bazaya əlavə edildi");
    }


    public function edit($id)
    {
        $categories = Categories::all();
        $homeCategories = HomeCategories::all();
        $movie = OneSerieDocumentals::findOrFail($id);
        return view('admin.oneseriedocumentals.edit', compact('homeCategories', 'categories', 'movie'));
    }

    public function update(OneSerieDocumentalsRequestUpdate $request, $id)
    {
        $this->movieService->update($request, $id);
        return redirect()->route('admin.oneseriedocumentals.index')->with("message", "məlumatlar yeniləndilər");
    }
    public function destroy($id)
    {
        $this->movieService->delete($id);
        return redirect()->route('admin.oneseriedocumentals.index')->with("message", "məlumat bazadan silindi");
    }
}
