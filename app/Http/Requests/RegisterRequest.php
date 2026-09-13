<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => 'required|string|min:6|unique:users',
            'password' => 'required|min:8',
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users',
        ];
    }
}
