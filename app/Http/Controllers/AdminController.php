<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\RegistrationDetail;


class AdminController extends Controller
{
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
