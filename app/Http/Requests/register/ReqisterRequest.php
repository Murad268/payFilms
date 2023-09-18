<?php

namespace App\Http\Requests\register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReqisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],   
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/',
            ],
            'passwordRepeat' => 'required|same:password',
        ];
    }



    public function messages(): array
    {
        return [
            'name.required' => 'Ad sahəsi mütləqdir.',
            'phone.required' => 'Telefon nömrəsi mütləqdir.',
            'email.required' => 'E-poçt ünvanı mütləqdir.',
            'email.email' => 'Düzgün e-poçt ünvanı daxil edin.',
            'email.unique' => 'Bu e-poçt ünvanı artıq qeydiyyatdan keçib.',
            'password.required' => 'Şifrə sahəsi mütləqdir.',
            'password.min' => 'Şifrə minimum 8 simvol olmalıdır.',
            'password.regex' => 'Şifrədə minimum bir böyük hərf və bir simvol olmalıdır.',
            'passwordRepeat.required' => 'Təsdiq şifrəsi sahəsi mütləqdir.',
            'passwordRepeat.same' => 'Təsdiq şifrəsi şifrə ilə uyğun gəlmir.',
        ];
    }
}
