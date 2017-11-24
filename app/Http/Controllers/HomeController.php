<?php

namespace App\Http\Controllers;

use App\Traits\storeStudentInfo;
use App\Traits\ImageUpload;
use App\Student;
use Illuminate\Http\Request;

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

    public function storeStudentInfo(Request $request)
    {
        if ($request->file('image')) {
			$avatar = $this->getImageLink($request['image']);
			$request->merge( ['avatar' => $avatar] );
		}

		$this->saveStudent($request);
		$this->savePaymentInfo($request);
		$this->saveStudentAddress($request);
		$this->saveRegistrationDetail($request);

		return "Information Saved Successfully!";
	}
}
