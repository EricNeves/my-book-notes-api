<?php

namespace App\Adapters\Web\Controllers\User\AuthenticateUser;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'    => 'required|string|email|max:255',
            'password' => 'required|string|min:4',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'The email field is required',
            'email.string'      => 'The email must be a valid email address',
            'email.email'       => 'The email must be a valid email address',
            'email.max'         => 'The email must be less than 255 characters',
            'password.required' => 'The password field is required',
            'password.string'   => 'The password field must be a string',
            'password.min'      => 'The password must be at least 4 characters',
        ];
    }
}
