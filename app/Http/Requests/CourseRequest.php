<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'status' => 'required|in:draft,published',
        ];
    }
}
