<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\RegistrationDetail;
use Auth;
use App\User;

class AdminController extends Controller
{
    public function showLoginForm() {
        if(!Auth::check()) {
            return view('login');
        }
        return redirect()->route('get_students');
    }

    public function login(Request $request)
    {
    	if(Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ])){
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            return redirect()->route('get_students');
        }
        else
        {
            return redirect()->back();
        }
    }

    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function getStudents() {
        $students = Student::all();
        return $students;
    }

    public function getRegisteredStudents() {
        $registeredStudents = RegistrationDetail::with('student')->get();
        dd($registeredStudents);
    }

    public function getSingleStudent($rollNumber) {
        $student = Student::where('roll_number', $rollNumber)->first();
        return $student;
    }

    public function getSingleRegisteredStudents($student_id) {
        $registeredStudent = RegistrationDetail::where('student_id', $student_id)->first();
        return $registeredStudent;
    }
}
