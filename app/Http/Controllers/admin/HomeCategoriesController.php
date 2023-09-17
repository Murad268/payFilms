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
    public function index()
    {
        $categories = HomeCategories::paginate(10);
        return view('admin.home_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.home_categories.create');
    }

    public function store(createHomeCategoriesRequest $request)
    {
        $this->homeCategoriesService->create($request);
        return redirect()->route('admin.home-categories.index')->with("message", "the information was added to the database");
    }


    public function edit($id)
    {
        $category = HomeCategories::findOrFail($id);

        return view('admin.home_categories.edit', compact('category'));
    }

    public function update(createHomeCategoriesRequest $request, $id)
    {
        $this->homeCategoriesService->update($request, $id);
        return redirect()->route('admin.home-categories.index')->with("message", "the information has been updated to the database");
    }

    public function destroy($id)
    {
        $this->homeCategoriesService->delete($id);
        return redirect()->route('admin.home-categories.index')->with('message', 'the information was deleted from the database');
    }
}
