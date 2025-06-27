<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'instagram' => 'nullable|url',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
