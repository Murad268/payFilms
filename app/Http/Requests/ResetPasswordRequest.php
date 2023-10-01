<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/',
            ],
            'repassword' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'Şifrə sahəsi mütləqdir.',
            'password.min' => 'Şifrə minimum 8 simvol olmalıdır.',
            'password.regex' => 'Şifrədə minimum bir böyük hərf və bir simvol olmalıdır.',
            'repassword.required' => 'Təsdiq şifrəsi sahəsi mütləqdir.',
        ];
    }
}
