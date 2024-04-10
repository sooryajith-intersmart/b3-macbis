<?php

namespace Modules\Admin\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|min:3|max:255',
            'link' => 'required',
            'image' => 'required|image|mimes:png,jpg,webp,jpeg|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
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
