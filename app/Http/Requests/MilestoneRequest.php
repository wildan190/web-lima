<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MilestoneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'sport_id' => 'required|exists:sports,id',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'picture_upload' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ];
    }
}
