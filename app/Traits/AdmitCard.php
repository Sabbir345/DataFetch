<?php

namespace App\Traits;
use App\Student;
use App\RegistrationDetail;

trait AdmitCard {
	
	public function getAdmitCardData($student_id)
	{
		$admitCard = Student::select(['id', 'name', 'father_name', 'avatar', 'roll_number'])
                            ->find($student_id);

		$data = [
			'admit_card' => $admitCard,
			'year' => date('Y'),
			'hall' => $this->getHallNumber(),
            'student_id' => $admitCard->id
		];

		if ($admitCard) {
			$student = RegistrationDetail::where('student_id', $admitCard->id)
											->select('student_type')
											->first();

			$data['student_type'] = isset($student->student_type) ? $student->student_type : '';
		}
		
		return $data;
	}
	
}