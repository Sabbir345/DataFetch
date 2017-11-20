<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $guarded = ['id'];

    public function student() 
    {
    	return $this->belongsTo(Student::class);
    }
}
