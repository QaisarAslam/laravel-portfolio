<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
			'user_id' => 'required|numeric',
			'first_name' => 'required|string|min:3|max:30',
			'last_name' => 'required|string|min:3|max:30',
			'gender' => 'required|string|max:10|min:4',
			'dob' => 'required|string|max:11',
			'address' => 'required|string|max:100|min:3',
			'country' => 'required|string|max:50|min:3',
			'state' => 'required|string|max:50|min:3',
			'city' => 'required|string|max:50|min:3',
			'zipcode' => 'nullable|string|max:10|min:5',
			'email_primary' => 'required|string|email|max:191|min:5',
			'email_secondary' => 'nullable|string|email|max:191|min:5',
			'mobile_primary' => 'required|string|max:15|min:7',
			'mobile_secondary' => 'nullable|string|max:15|min:7',
			'phone' => 'nullable|max:15|min:7',
			'whatsapp' => 'nullable|max:15|min:7',
			'facebook_profile' => 'nullable|url',
			'twitter_profile' => 'nullable|url',
			'linkedin_profile' => 'nullable|url',
			'website' => 'nullable|url|max:191',
			'about' => 'nullable|min:5',
			'avatar' => 'nullable|image|max:4096',
			'doc' => 'nullable|file|max:4096|mimes:pdf,docx,doc',
			'visibility' => 'sometimes|alpha|min:6|max:7'
		];
	}
}
