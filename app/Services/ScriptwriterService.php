<?php

namespace App\Services;


use App\Models\Scriptwriter;
use App\Services\DataServices;
use Exception;

class ScriptwriterService
{
    public function __construct(private DataServices $dataServices)
    {
    }

    public function create($request)
    {
        try {
            $actors = new Scriptwriter();
            $this->dataServices->save($actors, $request->all(), 'create');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            $actor = Scriptwriter::findOrFail($id);
            $this->dataServices->save($actor, $request->all(), 'update');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $position = Scriptwriter::findOrFail($id);
            $position->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
