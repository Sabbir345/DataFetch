<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $guarded = ['id'];


    // Relationship of Student table with others

    public function address()
    {
    	return $this->hasOne(Address::class);
    }

    public function paymentInfo()
    {
    	return $this->hasOne(PaymentInfo::class);
    }

    public function registrationDetail()
    {
        return $this->hasOne(RegistrationDetail::class);
    }
}
