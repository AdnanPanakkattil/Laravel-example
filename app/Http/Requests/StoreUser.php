<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // password_confirmation must match
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already in use.',
            'password.confirmed' => 'Passwords must match.',
        ];
    }
}
