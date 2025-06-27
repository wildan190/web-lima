<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'logo' => 'nullable|image|max:2048',
        ];
    }
}
