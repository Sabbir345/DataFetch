<?php

namespace App\Http\Controllers;

use App\Traits\storeStudentInfo;
use App\Traits\ImageUpload;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\InfoStoreRequest;

class HomeController extends Controller
{
	use ImageUpload, storeStudentInfo;

    public function index()
    {
    	return view('welcome');
    }

    public function getStudentInfo($rollNumber)
    {
    	$data = (new Student)
	    			 ->where('roll_number', $rollNumber)
					 ->with('address')->get();
					
    	return response()->json($data, 200);
    }

    public function storeStudentInfo(InfoStoreRequest $request)
    {	
		$student_id = $request['student_id'];

		
		if ( $this->checkIfRegistered($student_id) ) {
			return 'Already Registered';
		}
		
		if ($request->file('image')) {
			$avatar = $this->getImageLink($request['image']);
			$request->merge( ['avatar' => $avatar] );
		}

		$this->storeRegistrationData($request);

		return "Information Saved Successfully!";
	}

	public function showInfo(Request $request)
	{
		return $request->all();
	}


	/**
	 * Checking If a Student is able to register or not
	 * 
	 * @param $student_id
	 * 
	 * @return bool
	 */
	public function checkIfRegistered($student_id)
	{
		$registrationData = Student::with(['registrationDetail', 'paymentInfo'])
									->find($student_id);

		if ( isset($registrationData->registrationDetail) && 
			 isset($registrationData->paymentInfo) ) {
			
			return true;
		}

		return false;
	}

	
	/**
	 * Storing all request data into different tables
	 * 
	 * @param $request
	 * 
	 * @return void
	 */
	public function storeRegistrationData($request)
	{
		$this->saveStudent($request);
		$this->savePaymentInfo($request);
		$this->saveStudentAddress($request);
		$this->saveRegistrationDetail($request);
	}

	
}
