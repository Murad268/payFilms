<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\Settings;
use App\Services\İmageService;
use App\Services\DataServices;
use Exception;

class SettingsService
{
    public function __construct(private ImageService $imageService, private DataServices $dataServices)
    {
    }

    public function update($request, $id)
    {
        try {
            $setting = Settings::findOrFail($id);
            $result = $this->imageService->updateImage($request, 'assets/front/icons/', 'icon',  $setting->icon);
            $result2 = $this->imageService->updateImage($request, 'assets/front/icons/', 'logo',  $setting->logo);

            $data =  $request->all();
            $data['icon'] = $result;
            $data['logo'] = $result2;
            $this->dataServices->save($setting, $data, 'update');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
