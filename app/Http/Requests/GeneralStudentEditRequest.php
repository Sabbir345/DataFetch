<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralStudentEditRequest extends FormRequest
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
            'name' => 'required',
            'father_name' => 'required',
            'roll_number' => 'required',
            'post_office' => 'required',
            'village_name' => 'required',
            'district' => 'required',
            'upozilla_name' => 'required',
            'phone_home'    => 'required',
            'phone_personal' => 'required'
        ];
    }
}
