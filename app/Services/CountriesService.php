<?php

namespace App\Services;

use App\Models\Countries;
use App\Services\DataServices;
use Exception;

class CountriesService
{
    public function __construct(private DataServices $dataServices)
    {
    }

    public function create($request)
    {
        try {
            $categories = new Countries();
            $this->dataServices->save($categories, $request->all(), 'create');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function update($request, $id)
    {
        try {
            $category = Countries::findOrFail($id);
            $this->dataServices->save($category, $request->all(), 'update');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $position = Countries::findOrFail($id);
            $position->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
