<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutBannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'upload_picture' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ];
    }
}
