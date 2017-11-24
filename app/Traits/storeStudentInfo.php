<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\RegistrationDetail;
use App\PaymentInfo;
use App\Address;
use App\Student;


trait storeStudentInfo {
    
    private $studentData = [
        'email', 
        'phone_personal', 
        'phone_home', 
        'avatar'
    ];

	private $addressData = [
        'student_id', 
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
        'residential_status'
    ];

    private $paymentData = [
        'student_id',
        'payment_type',
        'sender_no'
    ];

    
    public function saveRegistrationDetail(Request $data)
	{
        $registration = (new RegistrationDetail)
                        ->where('student_id', $data['student_id'])
                        ->first();
        if($registration == null) {
            $registration = (new RegistrationDetail);
        }
        $registration->fill(
           $data->only($this->registrationData)
        );
        $registration->save();
	}

	public function saveStudentAddress(Request $data)
	{
        $address = (new Address)
                    ->where('student_id', $data['student_id'])
                    ->first();
        if($address == null) {
            $address = (new Address);
        }
		$address->fill(
            $data->only(
                $this->addressData
            )
        );
        $address->save();
	}
	
	public function saveStudent(Request $data)
	{
	    $student = (new Student)
                    ->find($data['student_id']);
		$student->fill(
            $data->only(
                $this->studentData
            )
        );
		$student->save();
    }
    
    public function savePaymentInfo(Request $data)
    {
        $paymentInfo = (new PaymentInfo)
                        ->where('student_id', $data['student_id'])
                        ->first();
        if($paymentInfo == null) {
            $paymentInfo = (new PaymentInfo);
        }
        $paymentInfo->fill(
            $data->only(
                $this->paymentData
            )
        );
        $paymentInfo->save();
    }
}