<?php

namespace App\Http\Controllers;

use App\ExamDate;
use App\RegistrationDetail;
use App\Student;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CSVRequest;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        if (!Auth::check()) {
            return view('login');
        }
        return redirect()->route('get_students');
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ])) {
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getAdminPanel()
    {
        $data = array(
            'totalGeneralStudents' => count(Student::all()),
            'totalRegisteredStudents' => count(RegistrationDetail::all()),
            'totalRegularStudents' => count(RegistrationDetail::where('student_type', 'regular')->get()),
            'totalIrregularStudents' => count(RegistrationDetail::where('student_type', 'irregular')->get()),
            'totalFemaleStudents' => count(RegistrationDetail::where('student_type', 'female')->get()),
            'totalImprovementStudents' => count(RegistrationDetail::where('student_type', 'improvement')->get()),
        );
        return view('admin.admin', array('data' => $data));
    }

    public function getExamDatePage()
    {
        $examDates = ExamDate::select('name', 'date')->get();
        return view('admin.exam-date', array('examDates' => $examDates));
    }

    public function saveExamDates(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            $date = ExamDate::where('name', $key)->first();
            $date->date = $value;
            $date->save();
        }

        return redirect()->route('exam-dates');
    }

    public function getRegisteredStudentsPage()
    {
        return view('admin.registered-student');
    }

    public function getGeneralStudentsPage()
    {
        $generalStudents = Student::paginate(50);
        // dd($generalStudents[0]->roll_number);
        return view('admin.general-student', array('generalStudents' => $generalStudents));
    }

    public function getStudents()
    {
        $students = Student::all();
        return $students;
    }

    public function getRegisteredStudents()
    {
        $registeredStudents = RegistrationDetail::with('student')->get();
        dd($registeredStudents);
    }

    public function getSingleStudent($rollNumber)
    {
        $student = Student::where('roll_number', $rollNumber)->first();
        return $student;
    }

    public function getSingleRegisteredStudents($student_id)
    {
        $registeredStudent = RegistrationDetail::where('student_id', $student_id)->first();
        return $registeredStudent;
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
        
        return redirect()->route('admin.dashboard');
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
