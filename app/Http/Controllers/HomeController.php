<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class HomeController extends Controller
{
    private $student = null;
    private $request = null;

    public function __construct(Student $student, Request $request)
    {
    	$this->student = $student;
    	$this->request = $request;
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

    public function storeStudentInfo(Request $request)
    {
    	return $request->all();
    }

    public function showinfo()
    {
        return view('show');
    }

    public function test()
    {
        return null;
    }


}
