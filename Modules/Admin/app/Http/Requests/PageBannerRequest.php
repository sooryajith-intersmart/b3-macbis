<?php

namespace Modules\Admin\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageBannerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'subtitle' => 'required|min:3|max:255',
            'title' => 'required|min:3|max:255',
            'image' => 'nullable|image|mimes:png,jpg,webp,jpeg|max:2048',
            'image_alt_text' => 'required|min:3|max:255',
        ];

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
