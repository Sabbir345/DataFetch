<?php

namespace App\Traits;
use App\Student;
use App\RegistrationDetail;
use App\ExamDate;

trait AdmitCard {
	
	public function getAdmitCardData($student_id)
	{
		$admitCard = Student::select(['id', 'name', 'father_name', 'avatar', 'roll_number'])
                            ->find($student_id);

		$data = [
			'admit_card' => $admitCard,
			'year' => date('Y'),
			'hall' => $this->getHallNumber($admitCard->id),
            'student_id' => $admitCard->id
		];

		if ($admitCard) {
			$student = RegistrationDetail::where('student_id', $admitCard->id)->first();

			$data['student_type'] = isset($student->student_type) ? $student->student_type : '';
			$data['residential_status'] = $student->residential_status;
			// attaching exam date 
			if(isset($student->student_type)) {
				$data['exam_date'] = $this->getExamDate($student);
			}
		}
		
		return $data;
	}


	public function getExamDate($student)
	{
		if($student->student_type == 'Regular') {
			return null;
		}

		$registrationId = $student->registration_id;

		//(1-800), (801-1600), (1601-2400), (2401-3200)

		$dateNumber = null;

		if($registrationId >= 2401) {
			$dateNumber = 4;
		} else if($registrationId >= 1601 && $registrationId <= 2400) {
			$dateNumber = 3;
		} else if($registrationId >= 801 && $registrationId <= 1600) {
			$dateNumber = 2;
		} else if($registrationId >= 1 && $registrationId <= 800) {
			$dateNumber = 1;
		}

		$examDate = ExamDate::where('name', 'date_'.$dateNumber)->first();

		if($examDate) {
			return $examDate->date;
		}
		
		return null;
	}
	
}