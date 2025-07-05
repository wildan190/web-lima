<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'picture_upload' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
        ];
    }
}
