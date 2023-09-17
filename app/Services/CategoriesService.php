<?php

namespace App\Services;

use App\Models\Categories;

use App\Services\DataServices;
use Exception;

class CategoriesService
{
    public function __construct(private DataServices $dataServices)
    {
    }

    public function create($request)
    {
        try {
            $categories = new Categories();
            $this->dataServices->save($categories, $request->all(), 'create');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function update($request, $id)
    {
        try {
            $category = Categories::findOrFail($id);
            $this->dataServices->save($category, $request->all(), 'update');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $position = Categories::findOrFail($id);
            $position->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
