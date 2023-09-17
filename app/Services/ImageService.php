<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class ImageService
{
    public function downloadImage($request, $path, $check, $default)
    {
        if ($request->hasFile($check)) {
            $img = $request->$check;
            $extension = $img->getClientOriginalExtension();
            $randomName = Str::random(10);
            $imagePath = $path;
            $lastName = $randomName . "." . $extension;
            $lasPath = $imagePath . $randomName . "." . $extension;

            Image::make($img)->save($lasPath);

            return $lastName;
        } else {
            return $default;
        }

    }

    public function updateImage($request, $path, $check, $hasElement) {

        $randomName = Str::random(10);
        $imagePath =  $path;

        if ($request->hasFile($check)) {
            if (file_exists($imagePath .  $hasElement)) {
                unlink($imagePath .  $hasElement);
            }
            $img = $request->$check;
            $extension = $img->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = $imagePath . $randomName . "." . $extension;
            Image::make($img)->save($lasPath);
        } else {
            $lastName =   $hasElement;
        }

        return $lastName;
    }


    public function deleteImage($path, $element) {
        if (file_exists($path .  $element)) {
            unlink($path .  $element);
        }
    }
}
