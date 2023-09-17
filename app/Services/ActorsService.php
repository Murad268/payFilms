<?php

namespace App\Services;

use App\Models\Actors;
use App\Models\Categories;
use App\Models\Positions;

use App\Services\DataServices;
use Exception;

class ActorsService
{
    public function __construct(private DataServices $dataServices)
    {
    }

    public function create($request)
    {
        try {
            $actors = new Actors();
            $this->dataServices->save($actors, $request->all(), 'create');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            $actor = Actors::findOrFail($id);
            $this->dataServices->save($actor, $request->all(), 'update');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $position = Actors::findOrFail($id);
            $position->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
