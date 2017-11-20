<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $table = 'payment_infos';

    protected $guarded = ['id'];

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }
}
