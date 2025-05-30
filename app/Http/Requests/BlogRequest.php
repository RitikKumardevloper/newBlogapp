<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $imgRule = $this->isMethod('post') ? 'required|' : 'nullable|';

        return [
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'img' => $imgRule . 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

}
