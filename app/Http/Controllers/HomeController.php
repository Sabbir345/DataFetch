<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoStoreRequest;
use App\Http\Requests\AdmitCardRequest;
use App\Http\Requests\CSVRequest;
use App\RegistrationDetail;
use App\Traits\storeStudentInfo;
use App\Traits\ImageUpload;
use App\Traits\AdmitCard;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller
{
	use ImageUpload, storeStudentInfo, AdmitCard;

    public function index()
    {
    	return view('welcome');
    }

    public function getStudentInfo($rollNumber)
    {
    	$studentInfo = (new Student)
					->where('roll_number', $rollNumber)
					->first();

    	if(!empty($studentInfo)) {
            return response()->json(array(
                'studentInfo' => $studentInfo,
                'status' => true
            ), 200);
        }

        return response()->json(array(
            'status' => false
        ), 200);
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
			if (!$this->checkIfRegistered($student->id)) {
				return view('error')->with([
					'message' => 'You are not registered!'
				]);
			}

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
	public function getHallNumber($studentId)
	{
		$row = RegistrationDetail::where([
			'student_id' => $studentId, 
			'student_type' => 'Regular'
			])->select('registration_id')->first();

		if(!isset($row)) return 0;

		$hallNumber = $row->registration_id / 55;
		if ($hallNumber == intval($hallNumber)) { // 2.00 == 2.00
			return $hallNumber;
		}
		return intval($hallNumber)+1;
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
		$student = Student::with('registrationDetail')
									->find($student_id);

		if (!empty($student->registrationDetail)) {
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
		$this->saveRegistrationDetail($request);
	}

	public function getAdmitCardPdf($roll_number)
    {
    	$student = Student::where('roll_number', $roll_number)
                          ->select('id')
                          ->first();

        if ($student) {
            $data = $this->getAdmitCardData($student->id);
            $pdf = PDF::loadView('admit-card', ['data' => $data]);
            return $pdf->download('admit-card.pdf');
        } else {
            dd('got there');
        }
	}
	

	/**
	 * Getting Uploaded CSV data
	 */
	public function getCSVData(CSVRequest $request)
	{
		$uploadedCsv = $request->file('student_csv');
		$fileExtension= $uploadedCsv->getClientOriginalExtension();

		if($fileExtension != "csv") {
			return ["The File Type Must be in csv"];
		}

		$csvAsArray = array_map('str_getcsv', file($uploadedCsv));

		foreach($csvAsArray as $index => $value) {
			if($index == 0) continue;

			$data = array(
				'roll_number' => $value[0],
				'name' => $value[1],
				'father_name' => $value[2],
				'village_name' => $value[3],
				'district' => $value[4],
				'upozilla_name' => $value[5],
				'post_office' => $value[6]
			);

			$alreadyExistsStudent = Student::where('roll_number', $data['roll_number'])->first();
			if(empty($alreadyExistsStudent)) {
				$this->storeStudent($data);
			}
		}
	}


	public function storeStudent($data) {
		$student = new Student;
		$student->roll_number = $data['roll_number'];
		$student->name = $data['name'];
		$student->father_name = $data['father_name'];
		$student->village_name = $data['village_name'];
		$student->district = $data['district'];
		$student->upozilla_name = $data['upozilla_name'];
		$student->post_office = $data['post_office'];

		$student->save();
	}
}
