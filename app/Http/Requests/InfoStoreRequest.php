<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoStoreRequest extends FormRequest
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
            
            'email' => 'required|email|unique:students,email',
            'image' => 'required|mimes:jpeg,bmp,png,jpg|image',
            'phone_personal' => 'required',
            'phone_home' => 'required',
            'd_o_b' => 'required',

            'profession' => 'required',
            'student_type' => 'required',
            'designation' => 'required',
            'passed_division' => 'required',
            'passed_year' => 'required',
            'residential_status' => 'required',

            'payment_type' => 'required',
            'sender_no' => 'required',

        ];
    }

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'image.required' => 'The image is required',
            'image.image'    => 'Image format is not supported',
            'd_o_b.required'    => 'Date of Birth is required',
		];
	}
}
