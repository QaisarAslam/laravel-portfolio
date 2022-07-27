<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
    	switch ($this->method())
    	{
    		case 'PUT':
    		$name = 'required|min:4|max:50|string|unique:clients,name,'.$this->id;
    		break;
    		default:
    		$name = 'required|min:4|max:50|string|unique:clients';
    		break;
    	}
        return [
            'name' => $name,
            'location' => 'nullable|min:3|max:191',
            'logo' => 'nullable|image|max:4096',
            'visibility' => 'sometimes|alpha|min:6|max:7'
        ];
    }
}
