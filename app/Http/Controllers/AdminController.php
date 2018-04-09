<?php

namespace App\Http\Controllers;

use App\ExamDate;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\CSVRequest;
use App\Http\Requests\GeneralStudentEditRequest;
use App\Http\Requests\RegisteredStudentEditRequest;
use App\RegistrationDetail;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        if (!Auth::check()) {
            return view('login');
        }
        return redirect()->route('admin.dashboard');
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();

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

    public function showPasswordChangeMenu()
    {
        return view('admin.change-password');
    }

    public function changeAdminPassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.showPasswordChangeMenu')->with('success', 'Your Password Changed Successfully!');
        }
        return redirect()->route('admin.showPasswordChangeMenu')->with('error', 'Your Old Password is Wrong!');
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

        return redirect()->route('exam-dates')->with('success', 'Exam Dates Updated Successfully!');
    }

    public function getRegisteredStudentsPage()
    {
        $registeredStudents = RegistrationDetail::with('student')->orderBy('id', 'DESC')->paginate(50);
        return view('admin.registered-student', array('registeredStudents' => $registeredStudents));
    }

    public function getRegisteredStudentShowPage($studentId)
    {
        $registeredStudent = RegistrationDetail::where('student_id', $studentId)->with('student')->first();
        return view('admin.registered-student-show', array('data' => $registeredStudent));

    }

    public function getRegisteredStudentEditPage($studentId)
    {
        $registeredStudent = RegistrationDetail::where('student_id', $studentId)->first();
        return view('admin.registered-student-edit', array('data' => $registeredStudent));
    }

    public function registeredStudentUpdate(RegisteredStudentEditRequest $request)
    {
        $registeredStudent = RegistrationDetail::where('student_id', $request->student_id)->first();
        foreach ($request->except('_token', 'student_id') as $key => $value) {
            $registeredStudent->{$key} = $value;
        }
        $registeredStudent->save();
        return redirect()->route('admin.registered-students')->with('success', 'Register Student Updated Successfully!');
    }

    public function registeredStudentDelete(Request $request)
    {
        $generalStudent = Student::find($request->student_id);

        if ($generalStudent) {
            $generalStudent->email = null;
            $generalStudent->d_o_b = null;
            $generalStudent->phone_personal = null;
            $generalStudent->phone_home = null;
            $generalStudent->avatar = null;
            $generalStudent->save();
        }

        $student = RegistrationDetail::where('student_id', $request->student_id)->first();
        $student->delete();

        return redirect()->route('admin.registered-students')->with('success', 'Registered Student Deleted Successfully!');
    }

    public function getGeneralStudentsPage()
    {
        $generalStudents = Student::orderBy('id', 'DESC')->paginate(50);
        return view('admin.general-student', array('generalStudents' => $generalStudents));
    }

    public function getGeneralStudentShowPage($id)
    {
        $student = Student::find($id);
        return view('admin.general-student-show', array('data' => $student));
    }

    public function getGeneralStudentCreatePage()
    {
        return view('admin.general-student-create');
    }

    public function createGeneralStudent(CreateStudentRequest $request)
    {
        $student = new Student();
        $student->fill($request->except('_token'));
        $student->save();

        return redirect()->route('admin.general-students')->with('success', 'New Student Created Successfully!');

    }

    public function getGeneralStudentEditPage($studentId)
    {
        $generalStudent = Student::find($studentId);
        return view('admin.general-student-edit', array('data' => $generalStudent));
    }

    public function generalStudentUpdate(GeneralStudentEditRequest $request)
    {
        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->roll_number = $request->roll_number;
        $student->post_office = $request->post_office;
        $student->village_name = $request->village_name;
        $student->district = $request->district;
        $student->upozilla_name = $request->upozilla_name;
        $student->phone_home = $request->phone_home;
        $student->phone_personal = $request->phone_personal;

        $student->save();

        return redirect()->route('admin.general-students')->with('success', 'Student Updated Successfully!');
    }

    public function generalStudentDelete(Request $request)
    {
        $registration = RegistrationDetail::where('student_id', $request->id)->first();
        if ($registration) {
            $registration->delete();
        }

        $student = Student::find($request->id);
        $student->delete();

        return redirect()->route('admin.general-students')->with('success', 'Student Deleted Successfully!');
    }

    /**
     * Getting Uploaded CSV data
     */
    public function getCSVData(CSVRequest $request)
    {
        set_time_limit(0);
        $uploadedCsv = $request->file('student_csv');
        $fileExtension = $uploadedCsv->getClientOriginalExtension();

        if ($fileExtension != "csv") {
            return ["The File Type Must be in csv"];
        }

        $csvAsArray = array_map('str_getcsv', file($uploadedCsv));

        foreach ($csvAsArray as $index => $value) {
            if ($index == 0) {
                continue;
            }

            $data = array(
                'roll_number' => $value[0],
                'name' => $value[1],
                'father_name' => $value[2],
                'village_name' => $value[3],
                'district' => $value[4],
                'upozilla_name' => $value[5],
                'post_office' => $value[6],
            );

            $alreadyExistsStudent = Student::where('roll_number', $data['roll_number'])->first();
            if (empty($alreadyExistsStudent)) {
                $this->storeStudent($data);
            }
        }

        return redirect()->route('admin.dashboard');
    }

    public function storeStudent($data)
    {
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
