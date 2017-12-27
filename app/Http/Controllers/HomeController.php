<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoStoreRequest;
use App\Http\Requests\AdmitCardRequest;
use App\Traits\storeStudentInfo;
use App\Traits\ImageUpload;
use App\Traits\AdmitCard;
use App\Student;
use Illuminate\Support\Facades\DB;
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
	public function getHallNumber($studentId)
	{
		$serial = DB::select(
			"SELECT d.myRowSerial
			FROM (
			    SELECT *, @rownum:=@rownum + 1 AS myRowSerial 
			    FROM registration_details, (SELECT @rownum:=0) AS nothingButSetInitialValue 
			    where student_type='Regular'
			) d
			WHERE d.id =".$studentId.";"
		);

		$hallNumber = $serial[0]->myRowSerial / 50;
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
}
