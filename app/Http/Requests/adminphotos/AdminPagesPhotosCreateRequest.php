<?php

namespace App\Http\Requests\adminphotos;

use Illuminate\Foundation\Http\FormRequest;

class AdminPagesPhotosCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {

        $rules = [];


        $rules["img"] = 'required|image|mimes:jpeg,jpg,png';





        return $rules;
    }

    public function messages(): array
    {

        $customMessages = [];


        $customMessages["img.required"] = "The img field is required.";
        $customMessages["img.image"] = "The img must be an image.";
        $customMessages["img.mimes"] = "The img must be a valid image format (jpeg, jpg, png).";
        $customMessages["img.max"] = "The img may not be larger than 2048 kilobytes.";

        return $customMessages;
    }
}
