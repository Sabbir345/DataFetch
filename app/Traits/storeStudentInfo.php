<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\RegistrationDetail;
use App\Student;


trait storeStudentInfo {
    
    private $studentData = [
        'email',
        'd_o_b',
        'phone_personal', 
        'phone_home', 
        'avatar',
        'village_name',
        'post_office',
        'upozilla_name',
        'district'
    ];

	private $registrationData = [
        'student_id', 
        'profession',
        'student_type',
        'designation', 
        'passed_division',
        'passed_year',
        'residential_status',
        'payment_type',
        'sender_no'
    ];

    
    public function saveRegistrationDetail(Request $data)
	{
        $registration = new RegistrationDetail;

        $registration->fill(
           $data->only($this->registrationData)
        );

        $registration->save();
	}
	
	public function saveStudent(Request $data)
	{
	    $student = (new Student)
                    ->find($data['student_id']);

		$student->fill(
            $data->only($this->studentData)
        );

		$student->save();
    }
    
}