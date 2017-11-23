<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoStoreRequest;
use App\Traits\ImageUpload;
use App\Student;


class HomeController extends Controller
{
    use ImageUpload;
	private $student = null;

    public function __construct(Student $student)
    {
    	$this->student = $student;
    }

    public function index()
    {
    	return view('welcome');
    }

    public function getStudentInfo($rollNumber)
    {
    	$data = $this->student
	    			 ->where('roll_number', $rollNumber)
	    			 ->with('address')->get();

    	return response()->json($data, 200);
    }

    public function storeStudentInfo(InfoStoreRequest $request)
    {
	    if ($request->file('avatar')) {
	    	$avatarLink = $this->getImageLink($request['avatar']);
	    }
	    
	    return $avatarLink;
    }
}
