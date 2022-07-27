<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'category_id' => 'required',
            'framework_id' => 'required',
            'name' => 'required|min:3|max:70',
            'url' => 'required|url',
            'description' => 'required|min:3|max:500',
            'featured_image' => 'nullable|image|max:4096',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|max:4096',
            'tags' => 'required|array',
            'tags.*' => 'required|numeric',
            'visibility' => 'sometimes|alpha|min:6|max:7'
        ];
    }
}
