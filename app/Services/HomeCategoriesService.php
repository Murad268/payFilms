<?php

namespace App\Services;

use App\Models\HomeCategories;
use App\Services\DataServices;
use Exception;

class HomeCategoriesService
{
    public function __construct(private DataServices $dataServices)
    {
    }

    public function create($request)
    {
        try {
            $categories = new HomeCategories();
            $this->dataServices->save($categories, $request->all(), 'create');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function update($request, $id)
    {
        try {
            $category = HomeCategories::findOrFail($id);
            $this->dataServices->save($category, $request->all(), 'update');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $position = HomeCategories::findOrFail($id);
            $position->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
