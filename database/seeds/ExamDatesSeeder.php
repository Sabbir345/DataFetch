<?php

use Illuminate\Database\Seeder;

class ExamDatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $examDates = [
            [
                'name' => 'female_date_1',
                'date' => date('Y-m-d')
            ],
            [
                'name' => 'female_date_2',
                'date' => date('Y-m-d'),
            ],
            [
                'name' => 'female_date_3',
                'date' => date('Y-m-d'),
            ],
            [
                'name' => 'female_date_4',
                'date' => date('Y-m-d'),
            ],
            [
                'name' => 'irregular_date_1',
                'date' => date('Y-m-d')
            ],
            [
                'name' => 'irregular_date_2',
                'date' => date('Y-m-d')
            ],
            [
                'name' => 'irregular_date_3',
                'date' => date('Y-m-d')
            ],
            [
                'name' => 'irregular_date_4',
                'date' => date('Y-m-d'),
            ],
            [
                'name' => 'improvement_date_1',
                'date' => date('Y-m-d')
            ],
            [
                'name' => 'improvement_date_2',
                'date' => date('Y-m-d')
            ],
            [
                'name' => 'improvement_date_3',
                'date' => date('Y-m-d')
            ],
            [
                'name' => 'improvement_date_4',
                'date' => date('Y-m-d')
            ],
        ];

        DB::table('exam_dates')->insert($examDates);

    }
}
