<?php

namespace Modules\Admin\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'thumb_image' => 'required|image|mimes:png,jpg,webp,jpeg|max:2048',
            'thumb_image_alt_text' => 'required',
            'image' => 'required|image|mimes:png,jpg,webp,jpeg|max:2048',
            'image_alt_text' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['thumb_image'] = 'nullable|image|mimes:png,jpg,webp,jpeg|max:2048';
            $rules['image'] = 'nullable|image|mimes:png,jpg,webp,jpeg|max:2048';
        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}