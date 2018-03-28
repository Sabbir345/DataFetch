<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisteredStudentEditRequest extends FormRequest
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
            'profession' => 'required',
            'student_type' => 'required',
            'designation' => 'required',
            'passed_year' => 'required',
            'passed_division' => 'required',
            'residential_status' => 'required',
            'payment_type' => 'required',
            'sender_no' => 'required',
        ];
    }
}
