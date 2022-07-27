<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'location' => 'nullable|min:3|max:191',
            'detail' => 'nullable|min:3',
            'image' => 'nullable|image|max:4096',
            'visibility' => 'sometimes|alpha|min:6|max:7'
        ];
    }
}
