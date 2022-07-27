<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
    	switch ($this->method()) {
    		case 'PUT':
    		$name = 'required|min:3|max:191|unique:skills,name,'.$this->id;
    		break;
    		default:
    		$name = 'required|min:3|max:191|unique:skills';
    		break;
    	}

        return [
            'name' => $name,
            'percentage' => 'required|numeric',
            'logo' => 'nullable|image|max:4096',
            'visibility' => 'sometimes|alpha|min:6|max:7'
        ];
    }
}
