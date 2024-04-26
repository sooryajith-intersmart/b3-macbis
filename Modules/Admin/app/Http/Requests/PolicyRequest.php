<?php

namespace Modules\Admin\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|min:3|max:255',
            'content' => 'required',
            'page_banner_subtitle' => 'required|min:3|max:255',
            'page_banner_title' => 'required|min:3|max:255',
            'page_banner_image' => 'required|image|mimes:png,jpg,webp,jpeg|max:2048',
            'page_banner_image_alt_text' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['page_banner_image'] = 'nullable|image|mimes:png,jpg,webp,jpeg|max:2048';
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