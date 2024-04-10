<?php

namespace Modules\Admin\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'section_one_title' => 'required|min:3|max:255',
            'section_two_title' => 'required|min:3|max:255',
            'section_two_title_two' => 'required|min:3|max:255',
            'section_three_title' => 'required|min:3|max:255',
            'section_three_description' => 'required',
            'section_three_image' => 'required|image|mimes:png,jpg,webp,jpeg|max:2048',
            'section_four_subtitle' => 'required|min:3|max:255',
            'section_four_title' => 'required|min:3|max:255',
            'section_five_title' => 'required|min:3|max:255',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['section_three_image'] = 'nullable|image|mimes:png,jpg,webp,jpeg|max:2048';
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

    public function messages()
    {
        return [
            'section_one_title.required' => 'The slider title field is required.',
            'section_one_title.min' => 'The slider title must be at least :min characters.',
            'section_one_title.max' => 'The slider title may not be greater than :max characters.',
            'section_two_title.required' => 'The business title field is required.',
            'section_two_title.min' => 'The business title must be at least :min characters.',
            'section_two_title.max' => 'The business title may not be greater than :max characters.',
            'section_two_title_two.required' => 'The business title (in red box) field is required.',
            'section_two_title_two.min' => 'The business title (in red box) must be at least :min characters.',
            'section_two_title_two.max' => 'The business title (in red box) may not be greater than :max characters.',
            'section_three_title.required' => 'The our story title field is required.',
            'section_three_title.min' => 'The our story title must be at least :min characters.',
            'section_three_title.max' => 'The our story title may not be greater than :max characters.',
            'section_three_description.required' => 'The our story description field is required.',
            'section_four_subtitle.required' => 'The enquiry subtitle field is required.',
            'section_four_subtitle.min' => 'The enquiry subtitle must be at least :min characters.',
            'section_four_subtitle.max' => 'The enquiry subtitle may not be greater than :max characters.',
            'section_four_title.required' => 'The enquiry title field is required.',
            'section_four_title.min' => 'The enquiry title must be at least :min characters.',
            'section_four_title.max' => 'The enquiry title may not be greater than :max characters.',
            'section_five_title.required' => 'The blogs title field is required.',
            'section_five_title.min' => 'The blogs title must be at least :min characters.',
            'section_five_title.max' => 'The blogs title may not be greater than :max characters.',
            'section_three_image.required' => 'The our story image field is required.',
            'section_three_image.image' => 'The file must be an image.',
            'section_three_image.mimes' => 'The file must be a PNG, JPG, WEBP, or JPEG.',
            'section_three_image.max' => 'The file may not be greater than :max kilobytes.',
        ];
    }
}