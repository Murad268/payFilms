<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\home_categories\createHomeCategoriesRequest;
use App\Models\HomeCategories;
use App\Services\HomeCategoriesService;
use Illuminate\Http\Request;

class HomeCategoriesController extends Controller
{
    public function __construct(private HomeCategoriesService $homeCategoriesService)
    {
    }
    public function index(Request $request)
    {
        $query = HomeCategories::query();

        // Check if a search query is provided
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('cat_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('slug', 'like', '%' . $searchTerm . '%');
            });
        }

        $categories = $query->paginate(10);

        return view('admin.home_categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.home_categories.create');
    }

    public function store(createHomeCategoriesRequest $request)
    {
        $this->homeCategoriesService->create($request);
        return redirect()->route('admin.home-categories.index')->with("message", "məlumat bazaya əlavə edildi");
    }


    public function edit($id)
    {
        $category = HomeCategories::findOrFail($id);

        return view('admin.home_categories.edit', compact('category'));
    }

    public function update(createHomeCategoriesRequest $request, $id)
    {
        $this->homeCategoriesService->update($request, $id);
        return redirect()->route('admin.home-categories.index')->with("message", "məlumatlar yeniləndilər");
    }

    public function destroy($id)
    {
        $this->homeCategoriesService->delete($id);
        return redirect()->route('admin.home-categories.index')->with('message', 'məlumat bazadan silindi');
    }
}
