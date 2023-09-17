<?php

namespace App\Services;

use App\Models\Actors;
use App\Models\Admin;
use App\Models\Categories;
use App\Models\Positions;

use App\Services\DataServices;
use Exception;
use Illuminate\Support\Facades\Cookie;

class AdminsService
{
    public function __construct(private DataServices $dataServices)
    {
    }

    public function hashParola($parola)
    {
        return hash('sha256', $parola);
    }

    public function create($request)
    {
        try {
            $admin = new Admin();
            $data = $request->all();
            $data['password'] = $this->hashParola($request->password);
            $this->dataServices->save($admin, $data, 'create');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



    public function update($request, $id)
    {
        try {
            $data = $request->all();
            $admin = Admin::findOrFail($id);
            $data['password'] = $this->usedPassword($admin, $data);
            if (Cookie::has('login')) {
                Admin::query()->update(['isLogged' => 0]);
                Cookie::queue(Cookie::make('login', "", -1));
            }

            $this->dataServices->save($admin, $data, 'update');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function usedPassword($model, $data)
    {
        if (!empty($data["password"])) {
            return $this->hashParola($data["password"]);
        } else {
            return $model->password;
        }
    }

    public function isLogged($login)
    {
        $cookieLogin = Cookie::has("login");
        if ($cookieLogin) {
            if ($login == Cookie::get('login')) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function delete($id)
    {
        try {
            $position = Admin::findOrFail($id);
            $position->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
