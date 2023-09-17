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
            $data = $request->all();
            if (isset($data['status'])) {
                $data['status'] = (bool) $data['status'];
            } else {
                $data['status'] = 0;
            }
            $this->dataServices->save($categories, $data, 'create');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function update($request, $id)
    {
        try {
            $category = Categories::findOrFail($id);
            $data = $request->all();
            if (isset($data['status'])) {
                $data['status'] = (bool) $data['status'];
            } else {
                $data['status'] = 0;
            }
            $this->dataServices->save($category, $data, 'update');
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
