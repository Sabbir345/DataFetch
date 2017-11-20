<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationDetail extends Model
{
    protected $table = 'registration_details';

    protected $guarded = ['id'];

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }
}
