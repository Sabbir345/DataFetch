<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
        	[
                'roll_number' => 123,
        		'name' => 'Jaber Ahmed',
                'father_name' => 'Jon Doe',
                'village_name' => 'Borlekha',
                'upozilla_name' => 'Borlekha',
                'post_office'   => 'Moulovibazar',
                'district'      => 'Moulovibazar'
	        ],
	        [
		        'roll_number' => 124,
		        'name' => 'Sabbir Ahmed',
		        'father_name' => 'Monsur Alam',
		        'village_name' => 'Bagbari',
		        'upozilla_name' => 'Chhatak',
		        'post_office'   => 'Chhatak',
		        'district'      => 'Sunamgonj'
	        ],
	        [
		        'roll_number' => 125,
		        'name' => 'Sudipto Chowdhury',
		        'father_name' => 'Sreekanta Chowdhury',
		        'village_name' => 'Mondolivog',
		        'upozilla_name' => 'Chhatak',
		        'post_office'   => 'Chhatak',
		        'district'      => 'Sunamgonj'
	        ]
        ];

        DB::table('students')->insert($students);
    }
}
