<?php

namespace App\Traits;

use App\Http\Requests\InfoStoreRequest;
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
        'designation', 
        'passed_division',
        'passed_year',
        'residential_status'
    ];

    private $paymentInfo = [
        'student_id',
        'payment_type',
        'sender_no'
    ];

    
    public function saveRegistrationDetail(InfoStoreRequest $data)
	{   
        $registration = (new RegistrationDetail)
                        ->where('student_id', $data['id'])
                        ->get();

		$registration->fill(
            $data->only(
                $this->registrationData
            )
        );
        
		$registration->save();
	}

	public function saveStudentAddress(InfoStoreRequest $data)
	{
        $address = (new Address)
                    ->where('student_id', $data['id'])
                    ->get();
        

		$address->fill(
            $data->only(
                $this->addressData
            )
        );

		$address->save();
	}
	
	public function saveStudent(InfoStoreRequest $data)
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
    
    public function savePaymentInfo(InfoStoreRequest $data)
    {
        $payment = (new PaymentInfo)
                    ->where('student_id', $data['id'])
                    ->get();
        

        $payment->fill(
            $data->only(
                $this->paymentInfo
            )
        );

        $payment->save();
    }
}