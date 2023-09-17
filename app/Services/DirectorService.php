<?php

namespace App\Services;

use App\Models\Actors;
use App\Models\Categories;
use App\Models\DirectorModel;
use App\Models\Positions;

use App\Services\DataServices;
use Exception;

class DirectorService
{
    public function __construct(private DataServices $dataServices)
    {
    }

    public function create($request)
    {
      
        try {
            $directors = new DirectorModel();

            $this->dataServices->save($directors, $request->all(), 'create');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            $director = DirectorModel::findOrFail($id);
            $this->dataServices->save($director, $request->all(), 'update');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $position = DirectorModel::findOrFail($id);
            $position->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
