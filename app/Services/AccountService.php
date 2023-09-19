<?php

namespace App\Services;

use App\Models\Actors;
use App\Models\Categories;
use App\Models\create_mainUsers;
use App\Models\Positions;

use App\Services\DataServices;
use Exception;

class AccountService
{
    public function __construct(private DataServices $dataServices, private ImageService $imageService)
    {
    }



    public function update($request, $id)
    {
        try {
            $portfolio = create_mainUsers::findOrFail($id);
            $result = $this->imageService->updateImage($request, 'assets/front/img/avatar/', 'avatar', $portfolio->avatar);
            $data = $request->all();
            $data['avatar'] = $result;
            $this->dataServices->save($portfolio, $data, 'update');
            return $data['avatar'];
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function hashParola($parola)
    {
        return hash('sha256', $parola);
    }
    public function passwordUpdate($request, $id) {
        $user = create_mainUsers::findOrFail($id);

        if($user->password != $this->hashParola($request->oldpass)) {
            return 0;
        } else {
            $user->update(["password" => $this->hashParola($request->newpass)]);
            return 1;
        }
    }
}
