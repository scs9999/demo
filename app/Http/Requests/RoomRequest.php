<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
        ];
    }
}
