<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categories\storeCategoriesRequest;
use App\Models\Categories;
use App\Services\CategoriesService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(private CategoriesService $categoriesService)
    {
    }
    public function index(Request $request)
    {
        $query = Categories::query();

        // Check if a search query is provided
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('slug', 'like', '%' . $searchTerm . '%');
            });
        }

        $categories = $query->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(storeCategoriesRequest $request)
    {
        $this->categoriesService->create($request);
        return redirect()->route('admin.categories.index')->with("message", "məlumatlar bazaya əlavə edildi");
    }


    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('admin.categories.update', compact('category'));
    }

    public function update(storeCategoriesRequest $request, $id)
    {
        $this->categoriesService->update($request, $id);
        return redirect()->route('admin.categories.index')->with("message", "məlumatlar yeniləndilər");
    }


    public function destroy($id)
    {
        $this->categoriesService->delete($id);
        return redirect()->route('admin.categories.index')->with('message', 'məlumat bazadan silindi');
    }
}
