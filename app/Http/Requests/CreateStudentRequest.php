<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'roll_number'   => 'required|unique:students|numeric',
            'name'          => 'required',
            'father_name'   => 'required',
            'village_name'  => 'required',
            'upozilla_name' => 'required',
            'post_office'   => 'required',
            'district'      => 'required'
        ];
    }
}
