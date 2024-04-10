<?php

namespace Modules\Admin\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'registered_address' => 'required',
            'registered_address_map_link' => 'nullable',
            'head_office_address' => 'required',
            'head_office_address_map_link' => 'nullable',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
            'facebook_link' => 'nullable|max:255',
            'instagram_link' => 'nullable|max:255',
            'twitter_link' => 'nullable|max:255',
            'linkedin_link' => 'nullable|max:255',
            'pinterest_link' => 'nullable|max:255',
            'youtube_link' => 'nullable|max:255',
            'map_link' => 'nullable',
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
