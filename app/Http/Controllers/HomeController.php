<?php

namespace App\Http\Controllers;

use App\Traits\storeStudentInfo;
use App\Traits\ImageUpload;
use App\Traits\AdmitCard;
use App\Student;
use App\RegistrationDetail;
use App\PaymentInfo;
use Illuminate\Http\Request;
use App\Http\Requests\InfoStoreRequest;
use App\Http\Requests\AdmitCardRequest;

class HomeController extends Controller
{
	use ImageUpload, storeStudentInfo, AdmitCard;

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
			return view('error')->with([
				'message' => 'This Student is Already Registered'
			]);
		}
		
		if ($request->file('image')) {
			$avatar = $this->getImageLink($request['image']);
			$request->merge( ['avatar' => $avatar] );
		}

		$this->storeRegistrationData($request);

		return view('show')->with([
			'data' => $this->getAdmitCardData($student_id)
		]);
	}

	public function getAdmitCard(AdmitCardRequest $request)
	{	
		$student = Student::where('roll_number', $request['roll_number'])
							->select('id')
							->first();

		if ($student) {
			// return $data = $this->getAdmitCardData($student->id);
			 $data = $this->getAdmitCardData($student->id);
			
			return view('show')->with('data', $data);
		}
		
		return view('error')->with([
			'message' => 'Admit Card Not Found or Wrong Registration ID'
		]);
	}

	
	/**
	 * Getting Hall Number by registered students
	 * 
	 * @return $hallNumber
	 */
	public function getHallNumber()
	{
		$totalRegisteredStudent = count(RegistrationDetail::all());
		return $hallNumber = intval($totalRegisteredStudent / 50)+1;
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
