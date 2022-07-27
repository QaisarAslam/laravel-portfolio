<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
	    		$name = 'required|min:3|max:50|unique:categories,name,'.$this->id;
	    		break;
    		default:
    			$name = 'required|min:3|max:50|unique:categories';
    			break;
    	}

        return [
            'name' => $name,
            'visibility' => 'sometimes|alpha|min:6|max:7'
        ];
    }
}
