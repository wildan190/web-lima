<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'web_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'about' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'history' => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
