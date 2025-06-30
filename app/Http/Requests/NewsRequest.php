<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:news,slug,'.$this->route('news'),
            'picture_upload' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'tag' => 'nullable|string',
            'keywords' => 'nullable|string',
            'status' => 'required|in:draft,publish,hidden',
        ];
    }
}
