<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'picture_upload' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'sport_id' => 'required|exists:sports,id',
            'description' => 'nullable|string',
        ];
    }
}
